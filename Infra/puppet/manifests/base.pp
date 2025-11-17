# Base configuration for all nodes

class farmtech_mis::base {
  # Update system packages
  exec { 'yum-update':
    command => '/usr/bin/yum update -y',
    path    => '/usr/bin:/bin',
    timeout => 300,
  }

  # Install essential packages
  package { ['wget', 'curl', 'git', 'unzip']:
    ensure => installed,
  }

  # Configure timezone
  file { '/etc/localtime':
    ensure => link,
    target => '/usr/share/zoneinfo/UTC',
  }

  # Configure hostname
  file { '/etc/hostname':
    ensure  => file,
    content => "${::hostname}\n",
  }
}

