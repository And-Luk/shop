function get_style(name) {
    //getElementById
    var temp_elenents = document.getElementsByTagName('*');
    var array_elements = [];
    temp_elenents.forEach(element => {

        element.get_style(href);
        if (typeof element == 'object')
            array_elements.push(element);

        else
            array_elements.push(getElementBy);
    });
}


// function getObjectDOM(id_or_name) {
//     return typeof id_or_name == 'object' ? id_or_name : document.getElementById(id_or_name)
// }

// function getStyleDOM(object) {
//     return getObjectDOM(object).style
// }

// function getClassesDOM(name) {
//     var elements = document.getElementsByTagName('*')
//     var objects_array = []

//     for (let index = 0; index < elements.length; index++)
//             if (elements[index].className == name)
//                     objects_array.push(elements[index])
//     return objects_array        
// }