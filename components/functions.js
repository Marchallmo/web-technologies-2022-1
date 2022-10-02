const students = [
    { name: 'Павел', age: 20 },
    { name: 'Иван', age: 20 },
    { name: 'Эдем', age: 20 },
    { name: 'Денис', age: 20 },
    { name: 'Виктория', age: 20 },
    { age: 40 },
 ]

 function pickPropArray(array, prop) 
 {
    var result = [];
    for(var i = 0; i < array.length; i++)
    {
        result.push(array[i][prop])
    }
    return result;
 }

 const result = pickPropArray(students, 'name')

console.log("result =" + result) 
// [ 'Павел', 'Иван', 'Эдем', 'Денис', 'Виктория' ]

function createCounter() {
    var count = 1;
  
    return function () {
      return count++;
    }
  }
  
  const counter1 = createCounter()
  console.log(counter1()) // 1
  console.log(counter1()) // 2
  
  const counter2 = createCounter()
  console.log(counter2()) // 1
  console.log(counter2()) // 2

  
function spinWords(string) 
{
    var stringSplit = string.split(' ');
    var result = [];

    for(var i = 0; i < stringSplit.length; i++)
    {
       if(stringSplit[i].length >= 5)
       {
            result.push(stringSplit[i].split().reverse().join());
       }
       else result.push(stringSplit[i])
    }
    return result; 
}
const result1 = spinWords( "Привет от Legacy" )
console.log(result1) // тевирП от ycageL

const result2 = spinWords( "This is a test" )
console.log(result2) // This is a test


  
