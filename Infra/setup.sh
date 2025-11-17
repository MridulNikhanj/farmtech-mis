#!/bin/bash

# FarmTech MIS Infrastructure Setup Script
# This script automates the setup process

set -e

echo "=========================================="
echo "FarmTech MIS Infrastructure Setup"
echo "=========================================="

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Check if running as root
if [ "$EUID" -eq 0 ]; then 
   echo -e "${RED}Please do not run as root${NC}"
   exit 1
fi

# Check prerequisites
echo -e "${YELLOW}Checking prerequisites...${NC}"

command -v terraform >/dev/null 2>&1 || { echo -e "${RED}Terraform is required but not installed.${NC}"; exit 1; }
command -v aws >/dev/null 2>&1 || { echo -e "${RED}AWS CLI is required but not installed.${NC}"; exit 1; }

echo -e "${GREEN}Prerequisites check passed${NC}"

# Navigate to terraform directory
cd terraform

# Check if terraform.tfvars exists
if [ ! -f "terraform.tfvars" ]; then
    echo -e "${YELLOW}terraform.tfvars not found. Creating from example...${NC}"
    cp terraform.tfvars.example terraform.tfvars
    echo -e "${RED}Please edit terraform.tfvars with your AWS credentials and configuration${NC}"
    echo -e "${YELLOW}Press Enter to continue after editing...${NC}"
    read
fi

# Initialize Terraform
echo -e "${YELLOW}Initializing Terraform...${NC}"
terraform init

# Plan
echo -e "${YELLOW}Planning infrastructure changes...${NC}"
terraform plan -out=tfplan

# Ask for confirmation
echo -e "${YELLOW}Review the plan above. Do you want to apply? (yes/no)${NC}"
read -r response
if [[ "$response" =~ ^([yY][eE][sS]|[yY])$ ]]; then
    echo -e "${YELLOW}Applying Terraform configuration...${NC}"
    terraform apply tfplan
    
    # Save outputs
    echo -e "${YELLOW}Saving Terraform outputs...${NC}"
    terraform output > ../outputs.txt
    
    echo -e "${GREEN}Infrastructure deployed successfully!${NC}"
    echo -e "${YELLOW}Outputs saved to outputs.txt${NC}"
    
    # Display important information
    echo ""
    echo -e "${GREEN}=========================================="
    echo "Deployment Summary"
    echo "==========================================${NC}"
    terraform output app_url
    terraform output nagios_url
    terraform output ssh_command_app
    terraform output ssh_command_nagios
    
else
    echo -e "${YELLOW}Terraform apply cancelled${NC}"
    exit 0
fi

cd ..

echo ""
echo -e "${GREEN}Next steps:${NC}"
echo "1. SSH into the application server and deploy your code"
echo "2. Configure Puppet on the application server"
echo "3. Set up Nagios monitoring"
echo "4. See README.md for detailed instructions"

