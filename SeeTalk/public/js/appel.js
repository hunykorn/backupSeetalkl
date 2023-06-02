/*$("#soumettre_message").click(function () {
  var msgpart = $("#ecrire_message").val();
  $.post("post.php", { text: msgpart });
  $("#ecrire_message").val("");
  return false;
});*/


navigator.getUserMedia = navigator.getUserMedia ||
                         navigator.webkitGetUserMedia ||
                         navigator.mozGetUserMedia;

function bindEvents(p){
  p.on('error',function(err){
    console.log('error',err)
  })

  p.on('signal',function(data){ //prends le signal en parametre SIGNAL : ça y est je suis prêt à communiquer
    document.querySelector('#offer').textContent = JSON.stringify(data) //met le contenue de l'offre EMITTER dans le textarea puis converti en jSON pour envoyer a RECEIVER
  })

  p.on('stream',function(stream){
    let receiverVideo = document.querySelector('#receiver-video') //récupération de la vidéo
    receiverVideo.src = window.URL.createObjectURL(stream) //attribu l'adresse url de la video à l'objet receiver
    receiverVideo.play() 
  })

  document.querySelector('#incoming').addEventListener('submit',function(e){
    e.preventDefault() //eviter que cela s'envoie 
    p.signal(JSON.parse(e.target.querySelector('textarea').value))
  })
}

function startPeer(initiator){
  navigator.getUserMedia({
    video: true,  //On veut la video
    audio: true   //On veut l'audio
  }, function(stream){
    let p = new SimplePeer({ //démarre une nouvelle video = nouvel objet SimplePeer
      initiator: initiator, //tu lance le flux
      stream :stream, //ce que tu veux partager
      trickle: false //créer l'offre d'une traite
       //config : préciser RTCiceServeur Stun et Turn Stun default dans la classe SimplePeer
    })
    bindEvents(p)
    let emitterVideo = document.querySelector('#emitter-video') //récupération de la vidéo
    emitterVideo.src = window.URL.createObjectURL(stream) //attribu l'adresse url de la video à l'objet emitter
    emitterVideo.play() 
  },function (){
      //function a utiliser si l'utilisateur refuse l'activation webcam
  })
}

document.querySelector('#startVid').addEventListener('click',function(e){ // si utilisateur appuie sur start il est initiator on lance la fnc startPeer
  startPeer(true)
})
document.querySelector('#receive').addEventListener('click',function(e){ // si utilisateur appuie sur start il est initiator on lance la fnc startPeer
  startPeer(false)
})

