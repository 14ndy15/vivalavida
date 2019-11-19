import sal from '../../../node_modules/sal.js/dist/sal'
import 'lazysizes';
import SmoothScroll from 'smooth-scroll';

sal();
new SmoothScroll('a[href*="#"]', {
    speed: 500,
    speedAsDuration: true
});
