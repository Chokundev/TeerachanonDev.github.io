let timerInterval
Swal.fire({
  title: 'ระบบกำลังโหลดข้อมูล',
  html: 'จะโหลดเสร็จภายใน <b></b> milliseconds.',
  timer: 2000,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    const b = Swal.getHtmlContainer().querySelector('b')
    timerInterval = setInterval(() => {
      b.textContent = Swal.getTimerLeft()
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
})

function btn1(){
    Swal.fire({        
        imageUrl: "image/01 (1).jpg",
        imageWidth: 505,
        imageHeight: 670,
      })
}

function btn2(){
    Swal.fire({        
        imageUrl: "image/02.png",
        imageWidth: 750,
        imageHeight: 400,
      })
}

function btn3(){
  Swal.fire({        
      imageUrl: "image/01 (2).jpg",
      imageWidth: 750,
      imageHeight: 400,
    })
}

function btn4(){
  Swal.fire({        
      imageUrl: "image/01 (10).jpg",
      imageWidth: 750,
      imageHeight: 400,
    })
}

function btn5(){
  Swal.fire({        
      imageUrl: "image/01 (11).jpg",
      imageWidth: 750,
      imageHeight: 400,
    })
}

function btn6(){
  Swal.fire({        
      imageUrl: "image/01 (12).jpg",
      imageWidth: 750,
      imageHeight: 400,
    })
}

function btn7(){
  Swal.fire({        
      imageUrl: "image/01 (13).jpg",
      imageWidth: 750,
      imageHeight: 400,
    })
}

function btn8(){
  Swal.fire({        
      imageUrl: "image/01 (14).jpg",
      imageWidth: 750,
      imageHeight: 400,
    })
}

function btn9(){
  Swal.fire({        
      imageUrl: "image/01 (15).jpg",
      imageWidth: 750,
      imageHeight: 400,
    })
}

function btn10(){
  Swal.fire({        
      imageUrl: "image/01 (16).jpg",
      imageWidth: 750,
      imageHeight: 400,
    })
}

function btn11(){
  Swal.fire({        
      imageUrl: "image/01 (17).jpg",
      imageWidth: 750,
      imageHeight: 400,
    })
}