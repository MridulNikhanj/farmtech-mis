# Nginx installation and configuration

class farmtech_mis::nginx {
  # Install Nginx
  package { 'nginx':
    ensure => installed,
  }

  # Create Nginx configuration directory
  file { '/etc/nginx/conf.d':
    ensure => directory,
    owner  => 'root',
    group  => 'root',
    mode   => '0755',
  }

  # Main Nginx configuration
  file { '/etc/nginx/nginx.conf':
    ensure  => file,
    content => template('farmtech_mis/nginx.conf.erb'),
    require => Package['nginx'],
    notify  => Service['nginx'],
  }

  # Laravel application configuration
  file { '/etc/nginx/conf.d/farmtech-mis.conf':
    ensure  => file,
    content => template('farmtech_mis/farmtech-mis.conf.erb'),
    require => Package['nginx'],
    notify  => Service['nginx'],
  }

  # Application directory will be created by laravel_app module

  # Start and enable Nginx
  service { 'nginx':
    ensure  => running,
    enable  => true,
    require => Package['nginx'],
  }

  # Firewall configuration (if firewalld is installed)
  exec { 'firewall-http':
    command => '/usr/bin/firewall-cmd --permanent --add-service=http',
    unless  => '/usr/bin/firewall-cmd --query-service=http',
    require => Package['nginx'],
  }

  exec { 'firewall-https':
    command => '/usr/bin/firewall-cmd --permanent --add-service=https',
    unless  => '/usr/bin/firewall-cmd --query-service=https',
    require => Package['nginx'],
  }

  exec { 'firewall-reload':
    command     => '/usr/bin/firewall-cmd --reload',
    refreshonly => true,
    subscribe   => [Exec['firewall-http'], Exec['firewall-https']],
  }
}

