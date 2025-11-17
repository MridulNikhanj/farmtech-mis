# Nagios monitoring server configuration

class farmtech_mis::nagios_server {
  include farmtech_mis::base

  # Install Nagios and required packages
  package { ['nagios', 'nagios-plugins-all', 'httpd', 'php', 'php-mysqlnd']:
    ensure => installed,
  }

  # Configure Nagios
  file { '/etc/nagios/nagios.cfg':
    ensure  => file,
    content => template('farmtech_mis/nagios.cfg.erb'),
    require => Package['nagios'],
    notify  => Service['nagios'],
  }

  # Create Nagios configuration directory
  file { '/etc/nagios/conf.d':
    ensure => directory,
    owner  => 'nagios',
    group  => 'nagios',
    mode   => '0755',
  }

  # Configure Nagios to monitor application server
  file { '/etc/nagios/conf.d/farmtech-mis.cfg':
    ensure  => file,
    content => template('farmtech_mis/nagios-farmtech-mis.cfg.erb'),
    require => [Package['nagios'], File['/etc/nagios/conf.d']],
    notify  => Service['nagios'],
  }

  # Configure Apache for Nagios
  file { '/etc/httpd/conf.d/nagios.conf':
    ensure  => file,
    content => template('farmtech_mis/nagios-httpd.conf.erb'),
    require => Package['httpd'],
    notify  => Service['httpd'],
  }

  # Create Nagios admin user
  exec { 'create-nagios-admin':
    command => '/usr/bin/htpasswd -b -c /etc/nagios/passwd nagiosadmin nagiosadmin',
    creates => '/etc/nagios/passwd',
    require => Package['nagios'],
  }

  # Start and enable services
  service { 'nagios':
    ensure  => running,
    enable  => true,
    require => Package['nagios'],
  }

  service { 'httpd':
    ensure  => running,
    enable  => true,
    require => Package['httpd'],
  }
}

