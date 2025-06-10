@extends('template.layout.app')
@section('content')
<style>
    .chat-user img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
}

    .chat-user.active {
        background: #e0e0ff;
    }
</style>
<main>
    <!--<section class="message-area">-->
         <div class="row w-100 m-0">
        <main class="col-md-10 offset-md-2 px-4">
        <!--<div class="col-md-12 dev1">-->
            <div class="d-flex align-items-center justify-content-between flex-wrap message-chathedingcompaign ">
                <div class="d-flex align-items-center flex-wrap me-3 flex-grow-1">
                    <h4 class="mb-0 editprofile-heding">Messages</h4>
                </div>
            </div>
            <div class="card message-card">
                <div class="container chat-container">
                    <div class="row">
                        <!--chat sidebar-->
                        <div class="col-md-4 col-12 chat-sidebar">
                            <div class="chatbox-msg">
                                <div class="d-flex your-chattrash align-items-center justify-content-between">
                                    <h5 id="deleteChatsBtn">Your Chats</h5>
                                </div>
                                <div class="chat-list" id="chatList">
                                    <!--show dynamic chat sidebar-->
                                </div>
                            </div>
                        </div>
                        <!--chat sidebar end-->
                        <!-- chat area-->
                        <div class="col-md-8 col-12 d-flex flex-column">
                            <div class="main-msgchat shadow-sm p-3">
                                <!-- Chat Header -->
                                <div class="chat-header d-flex align-items-center justify-content-between pb-2 mb-3 border-bottom">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="{{asset('default_user.png')}}" width="40" height="40"
                                            class="rounded-circle" />
                                        <h5 class="mb-0" id="chatHeader">Select a user to start conversation</h5>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0 border-0 bg-transparent" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fs-5"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <!-- Block Button -->
                                            <li>
                                                <a class="dropdown-item blockdrop-btn" href="#" id="blockToggle"
                                                    data-action="block">
                                                    <img src="{{ asset('assests/images/blockmsg.svg') }}"
                                                        alt="block" width="20px"> Block
                                                </a>
                                            </li>
                                            <!-- Delete Button -->
                                            <li>
                                                <a class="dropdown-item delete-blockk" href="#"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal">
                                                    <img src="{{ asset('assests/images/msgdelete.svg') }}" alt="delete"
                                                        width="20px"> Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                @php
                                    $senderImage = auth()->user()->user_type == 2
                                        ? asset('uploads/profilecompanion/' . auth()->user()->profile_picture)
                                        : asset('uploads/profile/' . auth()->user()->profile_picture);
                                @endphp
                                <!-- Chat Messages -->
                                <ul class="chat-messages list-unstyled mb-3" id="chat-box" 
                                    data-chat-id="{{ $chatId ?? ""}}" 
                                    data-auth-id="{{ auth()->id() }}" 
                                    data-sender-name="{{auth()->user()->name}}"
                                    data-sender-image="{{ $senderImage }}"
                                    data-receiver-id="{{ $receiver->id ?? "" }}"
                                    data-receiver-name="{{ $receiver->name ?? "" }}"
                                    data-receiver-image="{{ $receiver->profile_picture ?? "" }}"
                                    data-source="{{ $source ?? ''}}">
                                    {{-- <li class="placeholder text-center my-5 text-muted" id="chatPlaceholder">
                                        Please select a conversation to start chatting
                                    </li> --}}
                                    <!-- Messages will be injected here dynamically -->
                                </ul>
                                <!-- Message Box -->
                                <div class="message-boxsend d-flex align-items-center">
                                    <input type="text" class="form-control" id="messageInput" placeholder="Type a message" disabled/>
                                    <button type="button" id="sendBtn"><i class="fas fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- block model -->
        {{--<div class="modal fade" id="blockModal" tabindex="-1" aria-labelledby="blockModalLabel" aria-hidden="true">
          <div class="modal-dialog blockemodel-box">
              <div class="modal-content text-center blockmain-msg">
                  <div class="modal-header blockemodel border-0">
                      <button type="button" class="btn-close closebtn-msgchatmodel" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body blockmodelbody">
                      <div class="usermsgblock-icon">
                          <i class="fas fa-user"></i>
                      </div>
                      <h3>Block This User!</h3>
                      <h5>Are you sure you want to block this user?</h5>
                      <p>Once blocked, they will no longer be able to message you, view your profile,
                          or send you booking requests.
                          You can unblock them anytime from your settings.
                      </p>
                  </div>
                  <div class="modal-footer border-0 blockbtn-fotter ">
                      <button type="button" data-bs-dismiss="modal">Cancel</button>
                      <button type="button" id="confirmBlockBtn">Block User</button>
                  </div>
              </div>
          </div>
        </div>--}}
        <div class="modal fade" id="blockModal" tabindex="-1" aria-labelledby="blockModalLabel" aria-hidden="true">
          <div class="modal-dialog blockemodel-box">
            <div class="modal-content text-center blockmain-msg">
              <div class="modal-header blockemodel border-0">
                <button
                  type="button"
                  class="btn-close closebtn-msgchatmodel"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>
              <div class="modal-body blockmodelbody">
                <div class="usermsgblock-icon">
                  <i class="fas fa-user"></i>
                </div>
                <!-- Add the IDs here exactly as your JS expects: -->
                <h3 id="blockModalTitle">Block This User!</h3>
                <h5 id="blockModalSubtitle">Are you sure you want to block this user?</h5>
                <p>
                  Once blocked, they will no longer be able to message you, view your profile,
                  or send you booking requests. You can unblock them anytime from your settings.
                </p>
              </div>
              <div class="modal-footer border-0 blockbtn-fotter ">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                  Cancel
                </button>
                <!-- confirmBtn already has an ID that your JS wants -->
                <button type="button" id="confirmBlockBtn" class="btn btn-danger">
                  Block User
                </button>
              </div>
            </div>
          </div>
        </div>
        <!--end block model-->
        
        <!-- delete model -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
          aria-hidden="true">
          <div class="modal-dialog blockemodel-box">
              <div class="modal-content text-center blockmain-msg">
                  <div class="modal-header blockemodel border-0">
                      <button type="button" class="btn-close closebtn-msgchatmodel" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body blockmodelbody">
                     
                         <div class="usedelte-modelbtn mb-2">
                          <i class="las la-trash-alt"></i>
                        </div>
                  <h3>Delete Chat History</h3>
                  <p>Are you sure you want to delete this conversation? This action is permanent and cannot be undone.</p>
                  </div>
                  <div class="modal-footer border-0 delelted-modelfoter  ">
                      <button type="button" class="cancelblockbtn" data-bs-dismiss="modal">Cancel</button>
                      <button type="button" class="btndeleteblock" id="confirmDeleteBtn">Delete</button>
                  </div>
              </div>
          </div>
        </div>
        <!--end delete model-->
</main>
</div>
<!--</section>-->
<!-- Firebase App (the core Firebase SDK) -->
<script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-app-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-database-compat.js"></script>

<script type="module">
  // Firebase v9 modular SDK (ESM)
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.22.2/firebase-app.js";
    import { 
        getDatabase,
        ref,
        set,
        onValue,
        remove,
        onChildAdded,
        onChildChanged,
        onChildRemoved,
        get, push 
    } from "https://www.gstatic.com/firebasejs/9.22.2/firebase-database.js";
        
    const firebaseConfig = {
      apiKey: "AIzaSyABYZ2yTpIdSQhKXdV-_yPIRq-7zItZ3u0",
      authDomain: "amathyst-4e405.firebaseapp.com",
      projectId: "amathyst-4e405",
      storageBucket: "amathyst-4e405.firebasestorage.app",
      messagingSenderId: "231938039608",
      appId: "1:231938039608:web:292c3d23ad256e34e8abcd"
    };
    
    /* ===========================
       INITIALIZATION & GLOBAL VARIABLES
    =========================== */

    // -------------------- Firebase Setup -------------------- //
    const app = initializeApp(firebaseConfig);
    const db = getDatabase(app);
    
    // -------------------- Global Variables -------------------- //
    let chatBox = document.getElementById('chat-box');
    let authId = chatBox.dataset.authId;
    let senderName = chatBox.dataset.senderName;
    let senderImage = chatBox.dataset.senderImage;
    let currentChatId = chatBox.dataset.chatId || "";  
    let currentReceiverId = chatBox.dataset.receiverId || "";
    let currentReceiverName = chatBox.dataset.receiverName || "";
    let currentReceiverImage = chatBox.dataset.receiverImage || "";
    let sourceType = chatBox.dataset.source || "";
    
    // -------------------- DOM Elements -------------------- //
    const chatHeader = document.getElementById("chatHeader");
    const chatPlaceholder = document.getElementById("chatPlaceholder");
    const messageInput = document.getElementById('messageInput');
    const sendBtn = document.getElementById('sendBtn');
    
    // ------- Block and unblock user --------------- //
    const blockToggleLink      = document.getElementById("blockToggle");
    const blockModalElement    = document.getElementById("blockModal");
    const blockModalTitle      = document.getElementById("blockModalTitle");
    const blockModalSubtitle   = document.getElementById("blockModalSubtitle");
    let   confirmBlockBtn      = document.getElementById("confirmBlockBtn");
    const bootstrapBlockModal  = new bootstrap.Modal(blockModalElement);
    
     // Initially disable the send button and message input if no conversation is selected.
    sendBtn.disabled = true;
    messageInput.disabled = true;
    
    // Variable to hold the unsubscribe function for the active conversation's listener.
    let currentChatUnsubscribe = null;
    let blockUnblockUnsubscribe = null;
    let blockedMeUnsubscribe    = null;
    
    
    // Function to check if we’ve already blocked the partner
    async function refreshBlockToggleUI() {
      // If no partner is selected, hide the “Block/Unblock” menu item
      if (!currentReceiverId) {
        blockToggleLink.style.display = "none";
        return;
      }
    
      // Check Firebase: does “blocks/edenId/shubhiId” exist?
      const snap = await get(ref(db, `blocks/${authId}/${currentReceiverId}`));
      if (snap.exists()) {
        // Eden has already blocked Shubhi → show “Unblock”
        blockToggleLink.textContent       = "Unblock";
        blockToggleLink.dataset.action    = "unblock";
        blockToggleLink.style.display     = "block";
      } else {
        // Eden has NOT blocked Shubhi → show “Block”
        blockToggleLink.textContent       = "Block";
        blockToggleLink.dataset.action    = "block";
        blockToggleLink.style.display     = "block";
      }
    }
    
    // Function to open the same modal in “block” or “unblock” mode
    function openBlockModal(mode) {
      // 1) Swap modal header/subtitle/button text & styles
      if (mode === "block") {
        blockModalTitle.textContent    = "Block This User!";
        blockModalSubtitle.textContent = "Are you sure you want to block this user?";
        confirmBlockBtn.textContent    = "Block User";
        confirmBlockBtn.classList.remove("btn-success");
        confirmBlockBtn.classList.add("btn-danger");
      } else if (mode === "unblock") {
        blockModalTitle.textContent    = "Unblock This User?";
        blockModalSubtitle.textContent = "Are you sure you want to unblock this user?";
        confirmBlockBtn.textContent    = "Unblock User";
        confirmBlockBtn.classList.remove("btn-danger");
        confirmBlockBtn.classList.add("btn-success");
      } else {
        console.error("openBlockModal: invalid mode:", mode);
        return;
      }
    
      // 2) Remove any old click‐handlers on confirmBlockBtn by cloning it
      confirmBlockBtn.replaceWith(confirmBlockBtn.cloneNode(true));
      confirmBlockBtn = document.getElementById("confirmBlockBtn");
    
      // 3) Attach the correct click handler
      if (mode === "block") {
        confirmBlockBtn.addEventListener("click", async () => {
          await blockUser();
          bootstrapBlockModal.hide();
          await refreshBlockToggleUI();         // now the menu item should read “Unblock”
          loadChatConversation(currentChatId);   // re‐draw header + input state
        });
      } else {
        confirmBlockBtn.addEventListener("click", async () => {
          await unblockUser();
          bootstrapBlockModal.hide();
          await refreshBlockToggleUI();         // now the menu item should read “Block”
          loadChatConversation(currentChatId);   // re‐draw header + input state
        });
      }
    
      // 4) Show the Bootstrap modal
      bootstrapBlockModal.show();
    }
    
    // let bookingChatRecreated = false;
    let bookingChatRecreated = (sourceType === "booking");
    
    // -------------------- Helper Functions -------------------- //
    // formatted time function
    function timeAgo(timestamp) {
      const seconds = Math.floor((Date.now() - timestamp) / 1000);
      
      let interval = Math.floor(seconds / 31536000);
      if (interval >= 1) {
        return interval + " year" + (interval > 1 ? "s" : "") + " ago";
      }
      interval = Math.floor(seconds / 2592000);
      if (interval >= 1) {
        return interval + " month" + (interval > 1 ? "s" : "") + " ago";
      }
      interval = Math.floor(seconds / 86400);
      if (interval >= 1) {
        return interval + " day" + (interval > 1 ? "s" : "") + " ago";
      }
      interval = Math.floor(seconds / 3600);
      if (interval >= 1) {
        return interval + " hour" + (interval > 1 ? "s" : "") + " ago";
      }
      interval = Math.floor(seconds / 60);
      if (interval >= 1) {
        return interval + " minute" + (interval > 1 ? "s" : "") + " ago";
      }
      return "Just now";
    }
    
    // sorting the chat sidebar
    function sortChatSidebar() {
        const chatList = document.getElementById("chatList");
        const chatUsers = Array.from(chatList.querySelectorAll('.chat-user'));
      
        // Sort by the stored timestamp in descending order.
        chatUsers.sort((a, b) => {
            return parseInt(b.dataset.lastTimestamp) - parseInt(a.dataset.lastTimestamp);
        });
      
        // Re-append them in sorted order.
        chatUsers.forEach(chatUser => {
            chatList.appendChild(chatUser);
        });
    }
    
    // set active chat
    function setActiveChat(chatId) {
      chatList.querySelectorAll('.chat-user').forEach(el => {
        el.classList.toggle('active', el.dataset.chatId === chatId);
      });
    }
    
    // when user comes first time from My Booking the chat is load
    if (sourceType === 'booking' && currentChatId) {
      // 1a) Create a “fresh” sidebar entry
      updateChatSidebar(currentChatId, {
        sender_id:    authId,
        sender_name:  senderName,
        receiver_id:   currentReceiverId,
        receiver_name: currentReceiverName,
        message:       '',
        timestamp:     Date.now()
      });
      
      // 1b) Highlight it
      setActiveChat(currentChatId);
      
      // 1c) Enable input & header
      document.getElementById('chatHeader').textContent = currentReceiverName;
      if (chatPlaceholder) chatPlaceholder.remove();
      sendBtn.disabled      = false;
      messageInput.disabled = false;
      
      // 1d) Load the (currently empty) conversation
      loadChatConversation(currentChatId);
      
    //   await refreshBlockToggleUI();
    }
    

    // -------------------- Sidebar Real-Time Updates -------------------- //
    const allChatsRef = ref(db, "chats");
    
    onChildAdded(allChatsRef, (snapshot) => {
        const chatId = snapshot.key;
        const messages = snapshot.val();
        const lastMessage = Object.values(messages).pop();
    
        updateChatSidebar(chatId, lastMessage);
    
        if (chatId === currentChatId) {
            setActiveChat(chatId);
            document.getElementById('chatHeader').textContent = currentReceiverName;
            loadChatConversation(chatId);
            sendBtn.disabled = false;
            messageInput.disabled = false;
        }
    });

    onChildChanged(allChatsRef, (snapshot) => {
        const chatId = snapshot.key;
        const messages = snapshot.val();
        const lastMessage = Object.values(messages).pop();
        updateChatSidebar(chatId, lastMessage);
    });
    
    onChildRemoved(allChatsRef, (snapshot) => {
        const chatId = snapshot.key;
        // Find the sidebar element using the chatId.
        const chatSidebarElement = document.querySelector(`[data-chat-id='${chatId}']`);
        if (chatSidebarElement) {
            chatSidebarElement.remove();
        }
    });
    
    // ------------ UPDATE CHAT SIDEBAR FUNCTION --------------- //
    async function updateChatSidebar(chatId, lastMessage) {
        // Skip this chat if the current user's id (authId) is not part of the chatId
        if (!chatId.includes(authId)) {
            return; 
        }
        
        let partnerName;
        if (chatId == currentChatId) {
            partnerName = currentReceiverName;
        } else {
            partnerName = lastMessage.sender_id == authId
              ? lastMessage.receiver_name || "Unknown User"
              : lastMessage.sender_name   || "Unknown User";
        }
        
        let formattedTime = timeAgo(lastMessage.timestamp);
        let chatUserElement;
        
        
        if (sourceType === 'booking' && chatId === currentChatId) {
            // Coming from booking, force fresh creation
            chatUserElement = null;
            sourceType = null;
        } else {
            // Normal sidebar lookup
            chatUserElement = document.querySelector(`[data-chat-id='${chatId}']`);
        }
       
        // If the sidebar item already exists, update it.
        if (chatUserElement) {
        
            const nameEl = chatUserElement.querySelector("strong");
            if (nameEl) nameEl.textContent = partnerName;
        
            const msgEl = chatUserElement.querySelector(".msgtiming p");
            if (msgEl) msgEl.textContent = lastMessage.message || "";
        
            const timeEl = chatUserElement.querySelector(".msgtiming span");
            if (timeEl) timeEl.textContent = formattedTime;
        
            chatUserElement.dataset.lastTimestamp = lastMessage.timestamp;
        } else {
            // Otherwise, create a new sidebar chat element.
            let newChatUser = document.createElement("div");
            newChatUser.classList.add("chat-user");
            newChatUser.dataset.chatId = chatId;
            newChatUser.dataset.lastTimestamp = lastMessage.timestamp;
    
            newChatUser.innerHTML = `
                <img src="{{ asset('default_user.png') }}" alt="img" class="chat-user-img">
                <div class="chatuser-txtt">
                 <div class="chatContent">
                    <strong>${partnerName}</strong>
                    <span class="count">2</span>
                </div>
                <div class="msgtiming">
                        <p>${lastMessage.message}</p>
                        <span>${formattedTime}</span>
                    </div>
                </div>
            `;
            document.getElementById("chatList").appendChild(newChatUser);
            chatUserElement = newChatUser;
        }
        
        sortChatSidebar();
        // If this chatId is the current one, ensure it remains active.
        if (chatId === currentChatId) {
            setActiveChat(chatId);
            document.getElementById('chatHeader').textContent = currentReceiverName;
            loadChatConversation(chatId);
            sendBtn.disabled = false;
            messageInput.disabled = false;
        }
    }
    
    // -------------------- Sidebar Click: Load Conversation -------------------- //
    document.getElementById("chatList").addEventListener("click", async function (event) {
      const clickedElement = event.target.closest(".chat-user");
      if (!clickedElement) return;
      
     
      // Extract the new chatId from the clicked element.
      const newChatId = clickedElement.dataset.chatId;
      
      // Determine the current user's partner (receiver) ID from the chatId.
      const parts = newChatId.split('_');
      // authId is assumed to be set as a global variable (the current user's ID)
      const newReceiverId = (parts[0] === authId) ? parts[1] : parts[0];
      
      // We also extract the receiver's name from the chat element.
      const newReceiverName = clickedElement.querySelector("strong").textContent;
      
      const newReceiverImage = clickedElement.querySelector("img").src;
      
      // Update the chat header with the partner's name.
      document.querySelector(".chat-header h5").textContent = newReceiverName;
      
      // Update global/current chat variables.
      currentChatId = newChatId;
      currentReceiverId = newReceiverId;
      currentReceiverName = newReceiverName;
      currentReceiverImage = newReceiverImage;
      
      
      // 4) ALSO update the dataset on the <ul id="chat-box">
      chatBox.dataset.chatId      = newChatId;
      chatBox.dataset.receiverId  = newReceiverId;
      chatBox.dataset.receiverName= newReceiverName;
      chatBox.dataset.receiverImage=newReceiverImage;
      
      // 3) Update header text & enable inputs
      document.querySelector(".chat-header h5").textContent = newReceiverName;
      sendBtn.disabled      = false;
      messageInput.disabled = false;
      
      if (chatPlaceholder) chatPlaceholder.remove();
      
      // ─────────────────────────────────────────────────────────────────────
      // **NEW: Refresh “Block/Unblock” UI now that we know currentReceiverId**
      await refreshBlockToggleUI();
        
        // // Enable input fields and send button
        // sendBtn.disabled = false;
        // messageInput.disabled = false;
        
        // 6) Highlight the clicked user in the sidebar
        setActiveChat(newChatId);
      
        // Load the conversation for the selected chat.
        loadChatConversation(newChatId);
    });
    
    // LOAD CHATS WHEN CLICK with block functionality
    async function loadChatConversation(newChatId) {
      // 1) Determine partnerId from newChatId
      const parts = newChatId.split("_");   
      const partnerId = (parts[0] === authId) ? parts[1] : parts[0];
      
      // ──────────────────────────────────────────────────────────────
      // DETACH any previous “blocks” listeners, so we don’t leak them:
      if (blockUnblockUnsubscribe) {
        blockUnblockUnsubscribe();
      }
      if (blockedMeUnsubscribe) {
        blockedMeUnsubscribe();
      }
      // ──────────────────────────────────────────────────────────────
      
      // 2A) Listen to “I have blocked them”:
      const blockRef = ref(db, `blocks/${authId}/${partnerId}`);
      blockUnblockUnsubscribe = onValue(blockRef, (snapshot) => {
        const iBlockedThem = snapshot.exists();
    
        if (iBlockedThem) {
          // I (authId) have blocked partnerId
          chatHeader.textContent = `You have blocked ${currentReceiverName} (Unblock to chat again)`;
          messageInput.disabled = true;
          sendBtn.disabled      = true;
        } else {
          // I have not blocked them – but maybe they blocked me?
          // Let the “blockedMe” listener handle the header, below.
          // If neither side is blocking, we restore normal header:
          chatHeader.textContent = currentReceiverName;
          // Only enable if “they haven’t blocked me” – so defer to blockedMeUnsubscribe:
          // (We'll update enable/disable once the other listener fires.)
        }
      });
      
      
      // 2B) Listen to “They have blocked me”:
      const blockedMeRef = ref(db, `blocks/${partnerId}/${authId}`);
      blockedMeUnsubscribe = onValue(blockedMeRef, (snapshot) => {
        const theyBlockedMe = snapshot.exists();
    
        if (theyBlockedMe) {
          // They (partnerId) have blocked me (authId)
          chatHeader.textContent = `${currentReceiverName} has blocked you`;
          messageInput.disabled = true;
          sendBtn.disabled      = true;
        } else {
          // They have not blocked me – but maybe I blocked them?
          // If I already blocked them, header was set in the other listener
          // Otherwise, restore normal header
          // We check the “I blocked them” ref to decide:
          get(ref(db, `blocks/${authId}/${partnerId}`)).then((snap) => {
            const iBlockedThem = snap.exists();
            if (!iBlockedThem) {
              // Neither side is blocking → normal mode
              chatHeader.textContent = currentReceiverName;
              messageInput.disabled = false;
              sendBtn.disabled      = false;
            } else {
              // I have blocked them → header already set by blockUnblockUnsubscribe callback
              // (just keep input disabled)
            }
          });
        }
      });
      
      // 4) Load existing messages anyway (and continue listening for new ones)
      //    Clear the old DOM messages
      chatBox.innerHTML = "";
    
      // 5) Detach any previous listener
      if (currentChatUnsubscribe) {
        currentChatUnsubscribe();
      }
    
      // 6) Attach a new listener for the selected chat
      const newChatRef = ref(db, `chats/${newChatId}`);
      currentChatUnsubscribe = onChildAdded(newChatRef, (snapshot) => {
        const message = snapshot.val();
        const isSender = message.sender_id == authId;
    
        // Build the <li> with proper “message-right” or “message-left” classes
        const li = document.createElement("li");
        li.classList.add("d-flex", "mb-2");
        const messageDiv = document.createElement("div");
        messageDiv.classList.add(isSender ? "message-right" : "message-left");
        messageDiv.textContent = message.message;
    
        const img = document.createElement("img");
        const imagePath = isSender ? message.sender_image : message.receiver_image;
        img.src = `{{ asset('assests/images') }}/${imagePath}`;
        img.alt = "";
        img.classList.add(isSender ? "right-emojimsg" : "onlinechat-img", "me-2");
        img.onerror = function() {
          this.src = `{{ asset('default_user.png') }}`;
        };
    
        if (isSender) {
          li.classList.add("justify-content-end");
          li.appendChild(messageDiv);
          // If you wanted to show the sender’s avatar on the right, you could append img here
        } else {
          li.classList.add("align-items-start");
          li.appendChild(img);
          li.appendChild(messageDiv);
        }
    
        chatBox.appendChild(li);
        chatBox.scrollTop = chatBox.scrollHeight;
      });
    }



    // ------------------------------------------------------
    //  Current Chat Box – Sending & Receiving Messages
    // ------------------------------------------------------
    
    // const currentChatRef = ref(db, `chats/${currentChatId}`);
    
    sendBtn.addEventListener('click', sendMessage);
    messageInput.addEventListener('keypress', function (e) {
        if (e.key === 'Enter') sendMessage();
    });
    
    // update block user send message function  
    async function sendMessage() {
        const message = messageInput.value.trim();
        if (message === '') return;
    
        // Instead of using the original constant chatId, get the current values.
        const chatIdToUse = chatBox.dataset.chatId || currentChatId;
        // Use the updated receiver info:
        const receiverIdToUse = chatBox.dataset.receiverId || currentReceiverId;
        const receiverNameToUse = chatBox.dataset.receiverName || currentReceiverName;
        const receiverImageToUse = chatBox.dataset.receiverImage || currentReceiverImage;
        
        // Check if I (authId) have blocked the receiver
        const iBlockedThemSnap = await get(ref(db, `blocks/${authId}/${receiverIdToUse}`));
        if (iBlockedThemSnap.exists()) {
        alert(`You have blocked ${receiverNameToUse} Unblock them if you want to send a message.`);
        return;
        }
        
        //  Check if the receiver has blocked me
        const theyBlockedMeSnap = await get(ref(db, `blocks/${receiverIdToUse}/${authId}`));
        if (theyBlockedMeSnap.exists()) {
        alert(`${receiverNameToUse} has blocked you. You cannot send a message.`);
        return;
        }
    
        const messageData = {
            sender_id: authId,
            sender_name: senderName,
            sender_image: senderImage,    
            receiver_id: receiverIdToUse,
            receiver_name: receiverNameToUse, 
            receiver_image: receiverImageToUse,
            message: message,
            timestamp: Date.now()
        };
    
        push(ref(db, `chats/${chatIdToUse}`), messageData)
            .then(() => {
                messageInput.value = '';
            })
            .catch((error) => {
                alert('Message failed to send. Please try again.');
                console.error('Message send failed:', error);
            });
    }
    
    /* --------------- DELETE CHAT FUNCTIONALITY --------------- */
    const confirmDeleteBtn = document.getElementById("confirmDeleteBtn");
    
    confirmDeleteBtn.addEventListener("click", function () {
      // Get current chatId
      let chatId = chatBox.dataset.chatId || currentChatId;
    //   console.log(chatId);
      
      if (!chatId) {
        alert("No chat selected to delete.");
        return;
      }
      
      // Create a reference to the chat node in Firebase.
      const chatRef = ref(db, `chats/${chatId}`);
    
      remove(chatRef)
        .then(() => {
          console.log("Chat deleted successfully.");
          chatBox.innerHTML = "";
          const deleteModal = bootstrap.Modal.getInstance(document.getElementById("deleteModal"));
          if (deleteModal) {
              deleteModal.hide();
          }
        })
        .catch((error) => {
          console.error("Error deleting chat:", error);
          alert("There was an error deleting the chat. Please try again.");
        });
    });
    
    // -------------------- BLOCK USER FUNCTIONALITY -------------------- //
    // const confirmBlockBtn = document.getElementById("confirmBlockBtn");
    confirmBlockBtn.addEventListener("click", blockUser);
    
    async function blockUser() {
      // 1) Determine who is blocking whom:
      //    - authId is the current user (Eden).
      //    - currentReceiverId is the user being blocked (Shubhi).
      if (!currentReceiverId) {
        alert("No user selected to block.");
        return;
      }
    
      // 2) Write to Realtime Database: blocks/{authId}/{currentReceiverId} = true
      const blockRef = ref(db, `blocks/${authId}/${currentReceiverId}`);
      await set(blockRef, true)
        .then(() => {
          const blockModalEl = document.getElementById("blockModal");
          const bsModal = bootstrap.Modal.getInstance(blockModalEl);
          if (bsModal) bsModal.hide();
    
          // Disable the message‐input and send button:
          messageInput.disabled = true;
          sendBtn.disabled = true;
    
          // Overwrite chat header or show a “You have blocked this user” message:
          chatHeader.textContent = `You have blocked ${currentReceiverName} (Unblock to chat again)`;
          
        //   alert(`You have blocked ${currentReceiverName}. To chat again, please unblock first.`);
        })
        .catch((error) => {
          console.error("Error blocking user:", error);
          alert("There was an error. Please try again to block this user.");
        });
    }
    
    // ------------------ UNBLOCK USER FUNCTIONALITY -------------------- //
    async function unblockUser() {
      if (!currentReceiverId) {
        alert("No user selected to unblock.");
        return;
      }
    
      // 1) Remove the block flag
      await remove(ref(db, `blocks/${authId}/${currentReceiverId}`));
    
      // 2) Re‐enable input & send button
      messageInput.disabled = false;
      sendBtn.disabled      = false;
    
      // 3) Restore the header to the partner’s name
      chatHeader.textContent = currentReceiverName;
    
    //   alert(`You have unblocked ${currentReceiverName}.`);
    }
    
    // ─────────────────────────────────────────────────────────
    // 2.6) Hook the menu item so it opens the modal in the right mode
    // ─────────────────────────────────────────────────────────
    await refreshBlockToggleUI();
    
    blockToggleLink.addEventListener("click", async (e) => {
      e.preventDefault();
      const actionMode = blockToggleLink.dataset.action; // either "block" or "unblock"
      openBlockModal(actionMode || "block");
    });
</script>
@endsection