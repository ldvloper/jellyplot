 //Returns Black or White Depending the background
 export function textColorByBg(rgb){
     let result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(rgb);
     if(result) {
         var r= parseInt(result[1], 16);
         var g= parseInt(result[2], 16);
         var b= parseInt(result[3], 16);
         rgb = r+","+g+","+b;//return 23,14,45 -> reformat if needed
     }
    rgb = parseRgbString(rgb);
    const brightness = Math.round(((parseInt(rgb[0]) * 299) +
        (parseInt(rgb[1]) * 587) +
        (parseInt(rgb[2]) * 114)) / 1000);
    return (brightness > 125) ? 'black' : 'white';
}

//Parse a given RGB string
 export function parseRgbString(rgb) {
    rgb = rgb.replace(/[^\d,]/g, '').split(',');
    return rgb;
}
