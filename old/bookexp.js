function calculate(){
          
    console.log("Hello World")
    const exp1 = document.getElementById("exp1").value;
    const exp2 = document.getElementById("exp2").value;
    const exp3 = document.getElementById("exp3").value;
    const exp4 = document.getElementById("exp4").value;
    const power = document.getElementById("power").value;
    var ex2 =(exp2 *1) * 50;
    var ex3 =(exp3 *1) * 100;
    var ex4 =(exp4 *1) * 500;

    var before_result1 = (exp1 *1) + (ex2 *1) + (ex3 *1) + (ex4 *1);

    var result1 = (before_result1 *1) / 200;
    console.log(result1);

    var result2 = (result1 *1) * (power *1);

    document.getElementById("result1").innerHTML = "ค่าทักษะที่ได้ : " + result1;
    document.getElementById("result2").innerHTML = "ค่าบารมีที่ได้  :  " + result2;

    Swal.fire({
        
        title: 'คำนวณสำเร็จ !!',
        text: 'คุณได้ทักษะทั้งหมด : ' + result1,
        
                })
      

}