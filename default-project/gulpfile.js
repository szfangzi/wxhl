var gulp = require('gulp');

var rev = require('gulp-rev');//给css js生成哈希码  main-adsad.js 防止缓存
var revReplace = require('gulp-rev-replace');//更新index页面上的css js引用，因为rev后文件名改变了
var useref = require('gulp-useref');//通过html注释合并css和js
var filter = require('gulp-filter');//筛选文件，比如筛选出js、筛选出css
var uglify = require('gulp-uglify');//压缩js
var csso = require('gulp-csso');//压缩css
var watch = require('gulp-watch');//代码修改监听
var batch = require('gulp-batch');
var postcss = require('gulp-postcss');//css处理
var autoprefixer = require('autoprefixer');//css处理里面的自动加前缀
var concat = require('gulp-concat');
var sourcemaps = require('gulp-sourcemaps');

//命令行执行gulp 默认执行default任务
gulp.task('default', function () {

});

gulp.task('build', function () {
    var jsFilter = filter('**/*.js', {restore:true});
    var cssFilter = filter('**/*.css', {restore:true});
    //排除首页 !**/index.html
    var indexHtmlFilter = filter(['**/*', '!**/index.html'], {restore:true});
    var processors = [
        autoprefixer({browsers: ['last 2 version']})//css处理里面的自动加前缀
    ];

    return gulp.src(['src/index.html','src/test.html'])//拿到要处理的文件
            .pipe(useref())
            .pipe(jsFilter)
            .pipe(uglify())
            .pipe(jsFilter.restore)//把处理好的代码扔回流
            .pipe(cssFilter)
            .pipe(postcss(processors))//CSS处理
            .pipe(csso())
            .pipe(cssFilter.restore)
            .pipe(indexHtmlFilter)
            .pipe(rev())
            .pipe(indexHtmlFilter.restore)
            .pipe(revReplace())
            .pipe(gulp.dest('dist'));
});

//监听文件改动
gulp.task('watch', function () {
    watch('src/**/*.*', batch(function (events, done) {
        gulp.start('build', done);
    }));
});

//concat sourcemaps测试  合并文件后sourcemaps可以在chrome调试的时候把合并的文件分解开来断点
gulp.task('concat', function () {

    gulp.src(['src/**/jquery.min.js', 'src/js/main.js', 'src/**/*.js'])
        .pipe(sourcemaps.init())
        .pipe(concat('js/all.js'))
        .pipe(uglify())
        .pipe(sourcemaps.write('js'))
        .pipe(gulp.dest('dist'));
});

