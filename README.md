# yimd.net Wordpress Theme
A modernized Gulp-based WordPress theme tailored for my personal blog and website @ [http://yimd.net](http://yimd.net).

### Setup
1. Run `npm install && bower install` in the project directory
2. Install PHP and Wordpress
3. From your Wordpress installation directory, navigate to `/wp-content/themes/` and create a symlink to the `.tmp` directory of this project
4. Log in to Wordpress as an administrator and install the theme through the UI
5. **Important:** Turn off caching to see changes when reloading

### Publish via FTP
1. Publish via FTP by editing and renaming `ftp-config.json.example` to `ftp-config.json`
2. Run `npm run publish`

### Stack
- SCSS, Gulp

### License
MIT
