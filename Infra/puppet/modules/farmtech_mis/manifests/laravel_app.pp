# Laravel application deployment

class farmtech_mis::laravel_app {
  $app_dir = '/var/www/farmtech-mis'
  $app_user = 'nginx'

  # Create application directory structure
  file { $app_dir:
    ensure => directory,
    owner  => $app_user,
    group  => $app_user,
    mode   => '0755',
  }

  file { "${app_dir}/storage":
    ensure => directory,
    owner  => $app_user,
    group  => $app_user,
    mode   => '0775',
    require => File[$app_dir],
  }

  file { "${app_dir}/storage/framework":
    ensure  => directory,
    owner    => $app_user,
    group    => $app_user,
    mode     => '0775',
    require  => File["${app_dir}/storage"],
  }

  file { ["${app_dir}/storage/framework/cache",
          "${app_dir}/storage/framework/sessions",
          "${app_dir}/storage/framework/views",
          "${app_dir}/storage/logs"]:
    ensure  => directory,
    owner    => $app_user,
    group    => $app_user,
    mode     => '0775',
    require  => File["${app_dir}/storage/framework"],
  }

  file { "${app_dir}/bootstrap/cache":
    ensure  => directory,
    owner    => $app_user,
    group    => $app_user,
    mode     => '0775',
    require  => File[$app_dir],
  }

  # Create .env file template
  file { "${app_dir}/.env":
    ensure  => file,
    owner   => $app_user,
    group   => $app_user,
    mode    => '0644',
    content => template('farmtech_mis/env.erb'),
    require => File[$app_dir],
  }

  # Install application dependencies (if composer.json exists)
  exec { 'composer-install':
    command     => '/usr/local/bin/composer install --no-dev --optimize-autoloader',
    cwd         => $app_dir,
    user        => $app_user,
    require     => [File["${app_dir}/.env"],
                    Class['farmtech_mis::composer']],
    refreshonly => true,
    subscribe   => File["${app_dir}/.env"],
  }

  # Run Laravel migrations
  exec { 'laravel-migrate':
    command     => "/usr/bin/php ${app_dir}/artisan migrate --force",
    cwd         => $app_dir,
    user        => $app_user,
    require     => [Exec['composer-install'],
                    Class['farmtech_mis::php']],
    refreshonly => true,
    subscribe   => Exec['composer-install'],
  }

  # Run Laravel seeders
  exec { 'laravel-seed':
    command     => "/usr/bin/php ${app_dir}/artisan db:seed --force",
    cwd         => $app_dir,
    user        => $app_user,
    require     => Exec['laravel-migrate'],
    refreshonly => true,
    subscribe   => Exec['laravel-migrate'],
  }

  # Optimize Laravel
  exec { 'laravel-optimize':
    command     => "/usr/bin/php ${app_dir}/artisan optimize",
    cwd         => $app_dir,
    user        => $app_user,
    require     => Exec['laravel-seed'],
    refreshonly => true,
    subscribe   => Exec['laravel-seed'],
  }

  # Create systemd service for Laravel queue worker (if needed)
  file { '/etc/systemd/system/farmtech-mis-queue.service':
    ensure  => file,
    content => template('farmtech_mis/farmtech-mis-queue.service.erb'),
    require => File[$app_dir],
    notify  => Exec['systemd-reload'],
  }

  exec { 'systemd-reload':
    command     => '/usr/bin/systemctl daemon-reload',
    refreshonly => true,
  }

  service { 'farmtech-mis-queue':
    ensure  => running,
    enable  => true,
    require => [File['/etc/systemd/system/farmtech-mis-queue.service'],
                Exec['systemd-reload']],
  }
}

