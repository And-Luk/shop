// first step on LOGO
canvas = getObjectDOM('logo');
context = canvas.getContext('2d');
context.font = 'bold italic 66px Georgia';
context.textBaseline= 'top';

image_my = new Image();
image_my.src = '../../shop/sources/flower.png';

image_my.onload = function() {
context.drawImage(image_my, 10, 25, 40, 40);
gradient = context.createLinearGradient(0, 0, 0, 89);
gradient.addColorStop(0.00, 'yellow');
gradient.addColorStop(0.66, 'grey');
context.fillStyle = gradient;
context.fillText("Ну типа магазин", 72, 8);
context.strokeText("Ну типа магазин", 70, 5);
};

function getObjectDOM(id_or_object) {
    return typeof id_or_object === 'object' ? id_or_object : document.getElementById(id_or_object);
}

function getStyleDOM(obj) {
    return getObjectDOM(obj).style;
}

function getClassesDOM(name) {
    // return document.getElementsByClassName(name)    //it change all
    var elements = document.getElementsByTagName('*');
    var objects_array = [];

    for (let index = 0; index < elements.length; index++)
            if (elements[index].className === name)
                    objects_array.push(elements[index]);
    return objects_array;        
}