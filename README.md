# daniely.im Wordpress Theme

[Gulp](https://github.com/gulpjs/gulp)-based WordPress theme tailored for my personal blog and website @ [http://daniely.im](http://daniely.im).

<img src="https://github.com/danyim/yimd/raw/master/screenshot.png" align="center" />

## Installation

1.  Use Node v7.10.1 `nvm install 7.10.1`
1.  Fetch dependencies: `yarn install && bower install`
1.  Run `make up` to pull the containers and build a Dockerized Wordpress installation
1.  Navigate to `http://localhost:8000` and go through the setup process (you'll only need to do this once)
1.  Activate the **daniely.im Theme** from Appearance > Themes

### Development

1.  Run the container in the background `make up`
1.  Start the `/src` watch process: `yarn run watch`
1.  Edit files
1.  See changes after a refresh at `http://localhost:8000`

### Deployment

Copy the example config and add credentials

```bash
cp ftp-config{.example,}.json
```

Then run `publish`:

```bash
yarn run publish
```
