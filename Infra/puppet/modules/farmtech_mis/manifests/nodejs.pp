# Node.js installation

class farmtech_mis::nodejs ($version = '18') {
  # Install Node.js using NodeSource repository
  exec { 'add-nodesource-repo':
    command => "/usr/bin/curl -fsSL https://rpm.nodesource.com/setup_${version}.x | /usr/bin/bash -",
    creates => '/etc/yum.repos.d/nodesource-el.repo',
    require => Package['curl'],
  }

  # Install Node.js and npm
  package { ['nodejs', 'npm']:
    ensure  => installed,
    require => Exec['add-nodesource-repo'],
  }

  # Install global npm packages
  package { ['pm2']:
    ensure   => installed,
    provider => 'npm',
    require  => Package['npm'],
  }
}

