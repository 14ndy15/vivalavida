import '../css/app.scss';

import './modules/_vendors';
import Gallery from "./modules/_gallery";
import Message from "./modules/_message";

new Gallery('.home .gallery');
new Gallery('.room--granma .gallery');
new Gallery('.room--che .gallery');
new Gallery('.room--cuba .gallery');
new Message();