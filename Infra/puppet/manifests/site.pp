# Site-wide Puppet configuration for FarmTech MIS

# Node definition for application server
node 'app-server' {
  include farmtech_mis::app_server
}

# Node definition for Nagios server
node 'nagios-server' {
  include farmtech_mis::nagios_server
}

# Default node configuration
node default {
  include farmtech_mis::base
}

