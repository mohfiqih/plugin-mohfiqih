<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css'>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
     <title>Button Sosial Media</title>

     <style>
        /* Custom styling for the chat button */
        #chat-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Chat popup styling */
        #chat-popup {
            margin-top: 20px;
            display: none;
            position: fixed;
            bottom: 80px;
            right: 20px;
            z-index: 1000;
            width: 300px;
            padding: 15px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

         /* Close button styling */
         #close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        /* Input styling */
        #chat-input {
            width: 100%;
            margin-top: 10px;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
            height: 40px;
        }
    </style>
</head>

<body>
     <button style="margin-top: 10px;border-radius: 50px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#whatsappModal">
          <i class="fas fa-wrench"></i> My Service
     </button>
     <button style="margin-top: 10px; border-radius: 50px;" type="button" class="btn btn-success" onclick="toggleChatPopup()">
          <i class="fas fa-comment-dots"></i>
     </button>

     <!-- WhatsApp Modal -->
     <div class="modal fade" id="whatsappModal" tabindex="-1" role="dialog" aria-labelledby="whatsappModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="whatsappModalLabel">Sosial Media</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>

                    <div class="modal-body">
                         <p>Klik tautan di bawah ini untuk menghubungi kami di Sosial Media:</p>
                         <button style="margin-top: 10px;" type="button" class="btn btn-success" data-toggle="modal" data-target="#whatsappModal">
                              <i class="fab fa-whatsapp"></i>
                              <a style="color: white;text-decoration: none;" href="https://wa.me/6289677138599" target="_blank"> WhatsApp</a>
                         </button>
                         <button style="margin-top: 10px;" type="button" class="btn btn-danger" data-toggle="modal" data-target="#whatsappModal">
                              <i class="fab fa-instagram"></i>
                              <a style="color: white;text-decoration: none;" href="#" target="_blank"> Instagram</a>
                         </button>
                         <button style="margin-top: 10px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#whatsappModal">
                              <i class="fab fa-telegram-plane"></i>
                              <a style="color: white;text-decoration: none;" href="#" target="_blank"> Telegram</a>
                         </button>
                    </div>
                   
               </div>
          </div>
     </div>

     <!-- Chat Popup -->
     <div class="container" >
          <div id="chat-popup" style="height: 400px;">
               <div class="row">
                         <div class="col-md-2">
                              <button style="margin-top: 10px;border-radius: 500px;" type="button" class="btn btn-success" onclick="toggleChatPopup()">
                                   <i id="robot-icon" class="fas fa-robot"></i>
                              </button>
                         </div>
                         <div class="col-md-10">
                              <div class="container">
                                   <p style="margin-top: 10px;">Hallo Gan & Sist, ada yang bisa saya bantu?</p>
                              </div>
                         </div>
               </div>

               <div class="container" style="margin-top: 230px;">
                    <div class="row" style="padding-right: 10px">
                         <div class="col-md-2">
                              <button style="margin-top: 10px;" type="button" class="btn btn-success" onclick="toggleChatPopup()">
                              <i class="fas fa-paper-plane"></i>
                              </button>
                         </div>
                         <div class="col-md-10">
                              <div class="container">
                              <input style="width: 180px;" type="text" id="chat-input" placeholder="Ketik pertanyaan anda...">
                              </div>
                         </div>                         
                    </div>
               </div>
          </div>
     </div>

     <!-- Tautan ke Bootstrap JS dan jQuery -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

     <script>
     function toggleChatPopup() {
          var popup = document.getElementById('chat-popup');
          popup.style.display = (popup.style.display === 'block') ? 'none' : 'block';

          // Tambahkan efek scrolling jika popup ditampilkan
          if (popup.style.display === 'block') {
               scrollToChatPopup();
          }
     }

     function scrollToChatPopup() {
          var chatPopup = document.getElementById('chat-popup');
          chatPopup.scrollIntoView({ behavior: 'smooth' });
     }
     </script>

</body>

</html>