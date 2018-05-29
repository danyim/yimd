# yimd.net Wordpress Theme
A modernized Gulp-based WordPress theme tailored for my personal blog and website @ [http://yimd.net](http://yimd.net).

## Installation
1. Run `npm install && bower install` at the project root
2. Run the following
    ```bash
    > make up # Start up up the Wordpress & PHP containers
    ```

3. Navigate to `http://localhost:8000` and go through the setup process (you'll only do this once)
4. Activate the **yimd** theme from Appearance > Themes

### Commands

```bash
> make up       # Start up the Wordpress & PHP containers
> make down     # Shut down the containers but persist data
> make clean    # Remove contains and all data
> make sh       # Attach a bash session to the server
> make logs     # View container logs
```

### Publish via FTP
1. Publish via FTP by editing and renaming `ftp-config.json.example` to `ftp-config.json`
2. Run `npm run publish`

### Stack
- SCSS, Gulp

### License
MIT
