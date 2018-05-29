# yimd.net Wordpress Theme
A modernized [Gulp](https://github.com/gulpjs/gulp)-based WordPress theme tailored for my personal blog and website @ [http://yimd.net](http://yimd.net).

## Installation
1. Run `npm install && bower install` at the project root
2. Run `make up` to download the containers and start them up
3. Navigate to `http://localhost:8000` and go through the setup process (you'll only need to do this once)
4. Activate the **yimd.net Theme** from Appearance > Themes

### Developing
1. Run the container in the background `make up`
2. Start the `/src` watcher: `yarn run watch`
3. Edit your files
4. See changes after a refresh in `http://localhost:8000`

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
2. Run `yarn run publish`

### Features
- SCSS, Gulp

### License
MIT
