output "vpc_id" {
  description = "VPC ID"
  value       = aws_vpc.main.id
}

output "app_server_public_ip" {
  description = "Public IP address of the application server"
  value       = aws_eip.app_eip.public_ip
}

output "app_server_private_ip" {
  description = "Private IP address of the application server"
  value       = aws_instance.app_server.private_ip
}

output "nagios_server_public_ip" {
  description = "Public IP address of the Nagios monitoring server"
  value       = aws_eip.nagios_eip.public_ip
}

output "rds_endpoint" {
  description = "RDS MySQL endpoint"
  value       = aws_db_instance.main.endpoint
  sensitive   = true
}

output "rds_address" {
  description = "RDS MySQL address"
  value       = aws_db_instance.main.address
}

output "s3_bucket_name" {
  description = "S3 bucket name for application files"
  value       = aws_s3_bucket.app_bucket.id
}

output "app_url" {
  description = "Application URL"
  value       = "http://${aws_eip.app_eip.public_ip}"
}

output "nagios_url" {
  description = "Nagios monitoring URL"
  value       = "http://${aws_eip.nagios_eip.public_ip}/nagios"
}

output "ssh_command_app" {
  description = "SSH command to connect to application server"
  value       = "ssh -i ~/.ssh/${var.key_pair_name}.pem ec2-user@${aws_eip.app_eip.public_ip}"
}

output "ssh_command_nagios" {
  description = "SSH command to connect to Nagios server"
  value       = "ssh -i ~/.ssh/${var.key_pair_name}.pem ec2-user@${aws_eip.nagios_eip.public_ip}"
}

