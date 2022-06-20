function obj2url(prefix, obj) {
        var args=new Array();
        if(typeof(obj) == 'object'){
            for(var i in obj)
                args[args.length]=any2url(prefix+'['+encodeURIComponent(i)+']', obj[i]);
        }
        else
            args[args.length]=prefix+'='+encodeURIComponent(obj);
        return args.join('&');
}

const bcv_parser = require("bible-passage-reference-parser/js/en_bcv_parser").bcv_parser;
const bcv = new bcv_parser;
const process = require('process');
var args = process.argv;
//console.log("arg:",`${args[2]}`);

if (typeof args[2] == 'undefined')
{
    console.log('None given');
}
 else
{
//    var str = bcv.osis(bcv.parse(`${args[2]}`).parsed_entities()[0]);
//    var str = bcv.parse(`${args[2]}`).parsed_entities()[0].entities;
    var str = bcv.parse(`${args[2]}`).parsed_entities();
    if (typeof str == 'undefined' || !str || str.length === 0 || str === "" || !/[^\s]/.test(str) || /^\s*$/.test(str))// || str.replace(/\s/g,"") === "")
   {
       console.log('Out of range');
   }
   else
    {
      answer_index = 0
      for (let answer_index in str){
	  if (str.hasOwnProperty(answer_index)) {
              for ( entity_index=0; entity_index<str[answer_index].entities.length; entity_index++) {
//               console.log('entity index:',entity_index,' type:',str[answer_index].entities[entity_index].type,' osis:',str[answer_index].entities[entity_index].osis);
	        range = ( str[answer_index].entities[entity_index].type === 'range' );
//              console.log(Reflect.has( str) );
//                console.log("range:",range);
                if(range) { 
                range=true;
                start_verse = str[answer_index].entities[entity_index].start.b + "." + str[answer_index].entities[entity_index].start.c + "." + str[answer_index].entities[entity_index].start.v;
                end_verse =  str[answer_index].entities[entity_index].end.b + "." + str[answer_index].entities[entity_index].end.c + "." + str[answer_index].entities[entity_index].end.v;
                //console.log(`${range}`);
                    verse = entity_index + ": Range:",`${start_verse}` + ":" + `${end_verse}`;
		    console.log(obj2url('json_post.php',  verse));
                } else {
                    verse = entity_index + ": Single:" + `${str[answer_index].entities[entity_index].osis}`;
                    console.log(obj2url('json_post.php',  verse));
                }
              }}
  	  answer_index++;
       }
   }
}





