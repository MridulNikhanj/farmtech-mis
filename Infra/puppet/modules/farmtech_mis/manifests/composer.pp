# Composer installation

class farmtech_mis::composer {
  # Download and install Composer
  exec { 'download-composer':
    command => '/usr/bin/curl -sS https://getcomposer.org/installer | /usr/bin/php',
    cwd     => '/tmp',
    creates => '/tmp/composer.phar',
    require => Package['php', 'curl'],
  }

  # Move Composer to global location
  file { '/usr/local/bin/composer':
    ensure  => file,
    source  => '/tmp/composer.phar',
    mode    => '0755',
    require => Exec['download-composer'],
  }

  # Ensure Composer is up to date
  exec { 'update-composer':
    command     => '/usr/local/bin/composer self-update',
    require     => File['/usr/local/bin/composer'],
    refreshonly => true,
  }
}

