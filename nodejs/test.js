var fs = require('fs');
fs.readFile('readme.txt', 'utf-8',function(err, data){
    console.log(data);
});
console.log(111);
