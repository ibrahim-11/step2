class App {

    static start() {
        window.onpopstate = () => {
            App.browse();
        }
        $('.nav-link').on('click', (evt) => {
            let btn = $(evt.target).closest('.navbar').find('.navbar-toggler').not('.collapsed');
            btn ? btn.click() : null;
        })
        $(document).ready(() => {
            App.browse();
        });
    }

    static browse() {
        console.clear();
        let hash = (window.location.hash || "#accueil").substring(1);
        $('#main').hide().html(hash).fadeIn();
    }

}