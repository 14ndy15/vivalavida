import axios from 'axios';

class Message{

    constructor(){
        this.form = document.querySelector('form.form');
        this.name = document.querySelector('#name');
        this.email = document.querySelector('#email');
        this.message = document.querySelector('#message');
        this.button = document.querySelector('#submit');

        this.notification = document.querySelector('.contact__message__notification');
        this.notificationText = this.notification.querySelector('p');

        this.event();
    }

    event(){
        this.button.addEventListener('click', this.send.bind(this));
        this.notification.addEventListener('click', this.send.bind(this));
    }

    closeNotification(){
        this.notification.classList.remove('contact__message__notification--is-visible');
    }

    send(e){
        e.preventDefault();

        if (this.form.checkValidity()){

            let name = this.name.value;
            let email = this.email.value;
            let message = this.message.value;

            const params = new URLSearchParams();
            params.append('name', name);
            params.append('email', email);
            params.append('message', message);

            let that = this;

            axios.post('/mail.php', params)
                .then(function (response) {
                    let serverCode = response.data.response;
                    if (serverCode === 'success'){
                        setTimeout(function(){
                            that.notificationText.innerHTML = "We are received your message, we get in touch soon :)";
                        }, 350);
                    }
                    else{
                        that.notificationText.innerHTML = "An error has occurred :(, try sending an email directly to <strong>vivalavida.cuba@gmail.com</strong>";
                    }

                })
                .catch(function (error) {
                    console.error('error in send message');
                    that.notificationText.innerHTML = "An error has occurred :(, try sending an email directly to <strong>vivalavida.cuba@gmail.com</strong>";
                });

            this.notification.classList.add('contact__message__notification--is-visible');
        }

    }
}

export default Message;