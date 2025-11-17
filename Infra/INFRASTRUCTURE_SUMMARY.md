# FarmTech MIS Infrastructure Summary

## ✅ Infrastructure Status: DEPLOYED

All AWS resources have been successfully created!

---

## 📍 Server Information

### Application Server (Laravel Website)
- **Public IP**: `52.71.74.175`
- **Private IP**: `10.0.1.198`
- **Public URL**: http://52.71.74.175
- **SSH Command**: `ssh -i C:\Users\Dell\.ssh\farmtech-key.pem ec2-user@52.71.74.175`

### Nagios Monitoring Server
- **Public IP**: `107.23.193.30`
- **Nagios URL**: http://107.23.193.30/nagios
- **SSH Command**: `ssh -i C:\Users\Dell\.ssh\farmtech-key.pem ec2-user@107.23.193.30`

### Database (RDS MySQL)
- **Endpoint**: `farmtech-mis-db.c81mkmc00xvn.us-east-1.rds.amazonaws.com`
- **Database Name**: `farm_app`
- **Username**: `admin`
- **Password**: `FarmTechMIS2024SecureDB` (from terraform.tfvars)
- **Port**: `3306`

### S3 Bucket
- **Bucket Name**: `farmtech-mis-production-app-bucket-2c2dc9dd`

### VPC
- **VPC ID**: `vpc-00597beaaaaa04149`

---

## 🎯 Next Steps: Deploy Application with Puppet

### Step 1: Connect to Application Server

You need to SSH into the application server. Since you're on Windows, you have two options:

#### Option A: Using Windows OpenSSH (if available)
```powershell
ssh -i C:\Users\Dell\.ssh\farmtech-key.pem ec2-user@52.71.74.175
```

#### Option B: Using PuTTY
1. Download PuTTY: https://www.putty.org/
2. Convert .pem to .ppk using PuTTYgen
3. Connect using PuTTY with the converted key

### Step 2: Install Puppet on Application Server

Once connected via SSH, run:

```bash
# Update system
sudo yum update -y

# Install Puppet
sudo yum install -y https://yum.puppet.com/puppet7-release-el-7.noarch.rpm
sudo yum install -y puppet-agent

# Add Puppet to PATH
echo 'export PATH=$PATH:/opt/puppetlabs/bin' >> ~/.bashrc
source ~/.bashrc
```

### Step 3: Copy Puppet Manifests to Server

From your Windows machine, copy Puppet files:

```powershell
# Navigate to project root
cd "C:\Users\Dell\Documents\LPU\PROJECTS\FarmTech-MIS\FarmTechMIS2 - Copy (2)\farm-manager\Infra"

# Copy Puppet manifests to server
scp -r -i C:\Users\Dell\.ssh\farmtech-key.pem puppet/* ec2-user@52.71.74.175:/tmp/puppet/
```

### Step 4: Set Up Puppet on Server

Back in SSH session:

```bash
# Create Puppet directory structure
sudo mkdir -p /etc/puppetlabs/code/environments/production
sudo cp -r /tmp/puppet/* /etc/puppetlabs/code/environments/production/

# Update Puppet configuration with RDS endpoint
sudo nano /etc/puppetlabs/code/environments/production/modules/farmtech_mis/manifests/laravel_app.pp
```

Update the RDS endpoint in the manifest file.

### Step 5: Apply Puppet Configuration

```bash
# Run Puppet to configure the server
sudo /opt/puppetlabs/bin/puppet apply /etc/puppetlabs/code/environments/production/manifests/site.pp
```

### Step 6: Deploy Laravel Application

Copy your Laravel application to the server:

```powershell
# From Windows, copy application files
cd "C:\Users\Dell\Documents\LPU\PROJECTS\FarmTech-MIS\FarmTechMIS2 - Copy (2)\farm-manager"
scp -r -i C:\Users\Dell\.ssh\farmtech-key.pem * ec2-user@52.71.74.175:/tmp/farmtech-mis/
```

Then in SSH:

```bash
sudo cp -r /tmp/farmtech-mis/* /var/www/farmtech-mis/
cd /var/www/farmtech-mis

# Set permissions
sudo chown -R nginx:nginx /var/www/farmtech-mis
sudo chmod -R 755 /var/www/farmtech-mis
sudo chmod -R 775 storage bootstrap/cache

# Configure .env
sudo -u nginx cp .env.example .env
sudo -u nginx nano .env
```

Update `.env` with:
```
DB_HOST=farmtech-mis-db.c81mkmc00xvn.us-east-1.rds.amazonaws.com
DB_DATABASE=farm_app
DB_USERNAME=admin
DB_PASSWORD=FarmTechMIS2024SecureDB
```

Then:

```bash
# Install dependencies
sudo -u nginx /usr/local/bin/composer install --no-dev --optimize-autoloader

# Generate key and migrate
sudo -u nginx php artisan key:generate
sudo -u nginx php artisan migrate --seed
sudo -u nginx php artisan optimize

# Restart services
sudo systemctl restart php-fpm nginx
```

### Step 7: Verify Website is Live

Open browser: **http://52.71.74.175**

---

## 🔍 Monitoring Setup

### Access Nagios Dashboard

1. Open: **http://107.23.193.30/nagios**
2. Login credentials need to be set (see deployment steps)

---

## 📝 Important Notes

- **Database Password**: `FarmTechMIS2024SecureDB`
- **Key File Location**: `C:\Users\Dell\.ssh\farmtech-key.pem`
- **All servers are running** and ready for deployment
- **Puppet manifests** are ready to configure the servers automatically

---

## 🆘 Troubleshooting

If you can't SSH:
- Verify key file exists at: `C:\Users\Dell\.ssh\farmtech-key.pem`
- Check security groups allow SSH (port 22)
- Try using PuTTY if OpenSSH doesn't work

If website doesn't load:
- Check Nginx is running: `sudo systemctl status nginx`
- Check PHP-FPM: `sudo systemctl status php-fpm`
- View logs: `sudo tail -f /var/log/nginx/error.log`

