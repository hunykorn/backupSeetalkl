let start = document.querySelector("#start-video")

start.addEventListener("click", () =>{
    navigator.mediaDevices.getUserMedia({
        audio: true
    },
    (stream) =>{
        let emitter = document.querySelector("#send-video")
        emitter.src = window.URL.createObjectURL(stream)
        console.log(emitter)
        emitter.play()
    },
    () =>{
        
    }
    )
})