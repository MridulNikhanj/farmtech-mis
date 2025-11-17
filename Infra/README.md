# FarmTech MIS Infrastructure Setup

This directory contains infrastructure automation configurations for the FarmTech MIS Laravel application using Terraform, Puppet, and Nagios.

## Directory Structure

```
Infra/
├── terraform/          # Terraform configuration for AWS infrastructure
├── puppet/             # Puppet manifests for configuration management
├── nagios/             # Nagios monitoring configuration
└── README.md           # This file
```

## Prerequisites

1. **AWS Account** with appropriate credentials
2. **Terraform** >= 1.0 installed
3. **Puppet** >= 7.0 installed (on target servers)
4. **AWS CLI** configured
5. **SSH Key Pair** created in AWS EC2

## Setup Instructions

### 1. Terraform Setup

#### Step 1: Configure AWS Credentials

Copy the example terraform variables file and fill in your values:

```bash
cd terraform
cp terraform.tfvars.example terraform.tfvars
```

Edit `terraform.tfvars` with your AWS credentials and configuration:

```hcl
aws_region = "us-east-1"
aws_access_key = "YOUR_AWS_ACCESS_KEY_ID"
aws_secret_key = "YOUR_AWS_SECRET_ACCESS_KEY"
db_password = "YOUR_STRONG_DB_PASSWORD"
key_pair_name = "your-key-pair-name"
```

**⚠️ IMPORTANT:** Never commit `terraform.tfvars` to version control as it contains sensitive information.

#### Step 2: Create AWS Key Pair

Before running Terraform, create an EC2 Key Pair in AWS:

1. Go to AWS Console → EC2 → Key Pairs
2. Create a new key pair named `farmtech-key` (or your preferred name)
3. Download the `.pem` file and save it securely
4. Update `key_pair_name` in `terraform.tfvars`

#### Step 3: Initialize and Apply Terraform

```bash
cd terraform
terraform init
terraform plan
terraform apply
```

This will create:
- VPC with public and private subnets
- EC2 instance for Laravel application
- EC2 instance for Nagios monitoring
- RDS MySQL database
- S3 bucket for application files
- Security groups and networking

#### Step 4: Save Terraform Outputs

After successful deployment, save the outputs:

```bash
terraform output > ../outputs.txt
```

You'll need these values for Puppet and Nagios configuration.

### 2. Puppet Setup

#### Step 1: Install Puppet on Application Server

SSH into the application server:

```bash
ssh -i ~/.ssh/farmtech-key.pem ec2-user@<APP_SERVER_IP>
```

Install Puppet:

```bash
sudo yum install -y https://yum.puppet.com/puppet7-release-el-7.noarch.rpm
sudo yum install -y puppet-agent
```

#### Step 2: Copy Puppet Manifests

From your local machine, copy Puppet manifests to the server:

```bash
scp -r -i ~/.ssh/farmtech-key.pem puppet/* ec2-user@<APP_SERVER_IP>:/tmp/puppet/
```

On the server:

```bash
sudo mkdir -p /etc/puppetlabs/code/environments/production
sudo cp -r /tmp/puppet/* /etc/puppetlabs/code/environments/production/
```

#### Step 3: Update Configuration with Terraform Outputs

Edit `/etc/puppetlabs/code/environments/production/modules/farmtech_mis/manifests/laravel_app.pp` and update:
- RDS endpoint from Terraform outputs
- Application server IP
- Database credentials

#### Step 4: Run Puppet

```bash
sudo /opt/puppetlabs/bin/puppet apply /etc/puppetlabs/code/environments/production/manifests/site.pp
```

### 3. Deploy Application Code

#### Option A: Using Git (Recommended)

On the application server:

```bash
cd /var/www
sudo git clone <YOUR_REPO_URL> farmtech-mis
cd farmtech-mis
sudo chown -R nginx:nginx .
```

#### Option B: Using SCP

From your local machine:

```bash
scp -r -i ~/.ssh/farmtech-key.pem farm-manager/* ec2-user@<APP_SERVER_IP>:/tmp/
```

On the server:

```bash
sudo cp -r /tmp/farm-manager/* /var/www/farmtech-mis/
sudo chown -R nginx:nginx /var/www/farmtech-mis
```

#### Configure Application

```bash
cd /var/www/farmtech-mis
sudo -u nginx cp .env.example .env
sudo -u nginx nano .env  # Update with RDS endpoint and credentials
sudo -u nginx /usr/local/bin/composer install --no-dev --optimize-autoloader
sudo -u nginx php artisan key:generate
sudo -u nginx php artisan migrate --seed
sudo -u nginx php artisan optimize
```

### 4. Nagios Setup

#### Step 1: SSH into Nagios Server

```bash
ssh -i ~/.ssh/farmtech-key.pem ec2-user@<NAGIOS_SERVER_IP>
```

#### Step 2: Install Nagios

```bash
sudo yum install -y nagios nagios-plugins-all httpd php php-mysqlnd
sudo systemctl enable nagios httpd
sudo systemctl start nagios httpd
```

#### Step 3: Configure Nagios

Copy Nagios configuration files:

```bash
sudo cp nagios/nagios.cfg /etc/nagios/conf.d/farmtech-mis.cfg
```

Edit the file and replace placeholders:
- `APP_SERVER_IP_PLACEHOLDER` → Application server IP from Terraform outputs
- `RDS_ENDPOINT_PLACEHOLDER` → RDS endpoint from Terraform outputs

#### Step 4: Create Nagios Admin User

```bash
sudo htpasswd -c /etc/nagios/passwd nagiosadmin
# Enter password when prompted
```

#### Step 5: Restart Nagios

```bash
sudo systemctl restart nagios
```

#### Step 6: Access Nagios Web Interface

Open in browser: `http://<NAGIOS_SERVER_IP>/nagios`

Login with:
- Username: `nagiosadmin`
- Password: (the one you set)

### 5. Verify Setup

1. **Application**: Visit `http://<APP_SERVER_IP>` in your browser
2. **Nagios**: Visit `http://<NAGIOS_SERVER_IP>/nagios`
3. **Database**: Verify connection from application server

## Configuration Files Reference

### Terraform Variables

- `variables.tf`: Variable definitions
- `main.tf`: Main infrastructure resources
- `outputs.tf`: Output values
- `terraform.tfvars`: Your specific configuration (not in git)

### Puppet Modules

- `manifests/site.pp`: Main site configuration
- `modules/farmtech_mis/manifests/`: Module definitions
- `modules/farmtech_mis/templates/`: Configuration templates

### Nagios

- `nagios/nagios.cfg`: Host and service definitions
- `nagios/commands.cfg`: Custom command definitions

## Troubleshooting

### Application Not Accessible

1. Check security groups allow HTTP/HTTPS traffic
2. Verify Nginx is running: `sudo systemctl status nginx`
3. Check Nginx logs: `sudo tail -f /var/log/nginx/error.log`
4. Verify PHP-FPM: `sudo systemctl status php-fpm`

### Database Connection Issues

1. Verify RDS security group allows traffic from app server
2. Check RDS endpoint is correct in `.env`
3. Test connection: `mysql -h <RDS_ENDPOINT> -u admin -p`

### Nagios Not Monitoring

1. Check Nagios configuration: `sudo nagios -v /etc/nagios/nagios.cfg`
2. Verify hosts are reachable: `ping <APP_SERVER_IP>`
3. Check Nagios logs: `sudo tail -f /var/log/nagios/nagios.log`

## Security Notes

1. **Never commit sensitive data** (passwords, keys, etc.)
2. **Use strong passwords** for database and Nagios
3. **Restrict security groups** to specific IPs in production
4. **Enable HTTPS** using Let's Encrypt or AWS Certificate Manager
5. **Regularly update** system packages and dependencies
6. **Rotate credentials** periodically

## Cost Optimization

- Use `t3.micro` for development/testing
- Enable RDS automated backups only if needed
- Use S3 lifecycle policies for old files
- Monitor AWS costs in CloudWatch

## Maintenance

### Update Application

```bash
cd /var/www/farmtech-mis
sudo -u nginx git pull
sudo -u nginx /usr/local/bin/composer install --no-dev --optimize-autoloader
sudo -u nginx php artisan migrate
sudo -u nginx php artisan optimize
sudo systemctl restart php-fpm nginx
```

### Backup Database

```bash
mysqldump -h <RDS_ENDPOINT> -u admin -p farm_app > backup_$(date +%Y%m%d).sql
```

### Update Infrastructure

```bash
cd terraform
terraform plan
terraform apply
```

## Support

For issues or questions:
1. Check application logs: `/var/www/farmtech-mis/storage/logs/laravel.log`
2. Check system logs: `journalctl -xe`
3. Review Terraform outputs: `terraform output`

