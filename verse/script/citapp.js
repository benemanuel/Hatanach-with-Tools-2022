const bcv_parser = require("bible-passage-reference-parser/js/en_bcv_parser").bcv_parser;
const bcv = new bcv_parser;
const commander = require('commander');

commander
  .version('1.0.0', '-v, --version')
  .usage('[OPTIONS]...')
  .option('-c, --custom <value>', 'Overwriting value.', 'Default Value')
  .option('-f, --flag', 'Detects if the flag is present.')
  .parse(process.argv);

const options = commander.opts();
const flag = (options.flag ? 'Flag is present.' : 'Flag is not present.');
const customflag = (options.custom ? 'Custom Flag is present.' : 'Custom Flag is not present.');

if (customflag)
 {
//   var str = bcv.osis(bcv.parse(`${options.custom}." masorah"`));
     //   var str = bcv.osis(bcv.parse(`${options.custom}." WLC"`));
  var str = bcv.osis(bcv.parse(`${options.custom}`));

  if (typeof str == 'undefined' || !str || str.length === 0 || str === "" || !/[^\s]/.test(str) || /^\s*$/.test(str) || str.replace(/\s/g,"") === "")
   {
     console.log("Didn't work EEE:", `${options.custom}`);
   }
  else
   {
     console.log(str);
   }
 }  else {
   res.write("Custom flag NOT FOUND");
 }

//console.log(bcv.parse("Mal3:24 masorah").osis());


