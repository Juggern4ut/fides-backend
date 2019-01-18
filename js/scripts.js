var navigation = document.getElementsByClassName('navigation')[0];
var navigation__button = document.getElementsByClassName('navigation__button')[0];
navigation__button.addEventListener('click', function(){
    if(navigation.classList.contains('navigation--open')){
        navigation.classList.remove('navigation--open');
    }else{
        navigation.classList.add('navigation--open');
    }
});