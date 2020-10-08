# daniely.im Wordpress Theme

[Gulp](https://github.com/gulpjs/gulp)-based WordPress theme tailored for my personal blog and website @ [http://daniely.im](http://daniely.im).

<img src="https://github.com/danyim/yimd/raw/master/screenshot.png" align="center" />

## Installation

1.  Run `npm install && bower install` at the project root
2.  Run `make up` to download the containers and start them up
3.  Navigate to `http://localhost:8000` and go through the setup process (you'll only need to do this once)
4.  Activate the **daniely.im Theme** from Appearance > Themes

### Development

1.  Run the container in the background `make up`
2.  Start the `/src` watch process: `yarn run watch`
3.  Edit files
4.  See changes after a refresh at `http://localhost:8000`

### Deployment

Copy the example config and add credentials

```bash
cp ftp-config{.example,}.json
```

Then run `publish`:

```bash
npm run publish
```
