const numbers = [1,2,3,4,5,6,6,7,8,8,9];
// 各値を3倍した数値を取得

let numericalResults = numbers.map(function(num) {
  return num*3;
})

// 取得した値を合計する。
let result = numericalResults.reduce(function(a,b) {
    return a+b;
  })

console.log(result);