const heb = require("hebrew-transliteration");
const transliterate = heb.transliterate;
const commander = require('commander');

//https://github.com/benemanuel/hebrew-transliteration#docs
commander
  .version('1.0.0', '-v, --version')
  .usage('[OPTIONS]...')
  .option('-c, --custom <value>', 'Overwriting value.', 'Default')
  .option('-f, --flag', 'Detects if the flag is present.')
  .option('-t, --transliterate <value>', 'Transliterate Hebrew verse.', '{}')
  .option('-o, --options <value>', 'Additional options for remove eg:{ removeVowels: true, removeShinDot: true, removeSinDot: true }.', '{}')
  .option('-q, --sequence <value>', 'Sequence a string of characters according to the SBL Hebrew Font manual following the pattern of: consonant - dagesh - vowel - taamim.', '{}')
  .option('-r, --remove <value>', 'Remove, default only removes taamim marks.','{}')
  .option('-s, --schema <value>', 'Schema for transliterate.', '{}')
  .parse(process.argv);

const options = commander.opts();
const flag = (options.flag ? 'Flag is present.' : 'Flag is not present.');
const customflag = (options.Custom ? 'Custom Flag is present.' : 'Custom Flag is not present.');
const hebverseflag = (options.Hebverse ? 'Hebverse Flag is present.' : 'Hebverse Flag is not present.');
const optionsflag = (options.Options ? 'Options Flag is present.' : 'Options Flag is not present.');
const removeflag = (options.Remove ? 'Remove Flag is present.' : 'Remove Flag is not present.');
const sequenceflag = (options.Sequence ? 'Sequence Flag is present.' : 'Sequence Flag is not present.');
const transliterateflag = (options.Transliterate ? 'Transliterate Flag is present.' : 'Transliterate Flag is not present.');
const transverseflag = (options.Transverse ? 'Transverse Flag is present.' : 'Transverse Flag is not present.');

//console.log('Flag:', `${flag}`);
//console.log('Custom:', `${options.custom}`);
//console.log('Hebverse:', `${options.transliterate}`);
//console.log('Transverse:', `${transliterate(options.transliterate)}`);
//if (transliterateflag){
//    console.log(`${transliterate(options.transliterate)}`);
//}
//if (sequenceflag){
   console.log(`${options.sequence}`);
//   console.log(`${transliterate(options.Sequence)}`);
//}
//console.log('Options:', `${options.options}`);
//console.log('Remove:', `${remove(options.remove)}`);
//console.log('Schema:', `${options.schema}`);



function postTrans(messageToChange,hebWord){
    let transWord = transliterate(hebWord);
    console.log(messageToChange,transWord);
//    document.getElementById(messageToChange).innerHTML = transWord;
}

// postTrans("Message",transliterate("????????????????"));










