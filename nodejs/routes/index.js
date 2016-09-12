var express = require('express');
var router = express.Router();
var bodyParser = require('body-parser');
var mysql = require('mysql');

/* GET home page. */
router.get('/', function(req, res, next) {
  var con = mysql.createConnection({
    host:'localhost',
    user:'root',
    database:'think'
  });
  con.query('select * from hd_user', function (err, rows) {
    console.log(rows);
  });
  res.render('index', { title: 'Express' });
});
router.post('/test',  function(req, res, next) {
  console.log(1,req.body);
});

module.exports = router;
