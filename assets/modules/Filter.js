/**
 * @property {HTmlElement} pagination
 * @property {HTmlElement} content
 * @property {HTMLFormElement} form
 */
export default class Filter {

    /**
     * @param {HTmlElement|null} element
     */
    constructor(element){
        if(element === null){
            return;
        }
        this.pagination = document.querySelector('.js-filter-pagination')
        this.content = document.querySelector('.js-filter-content')
        this.form = document.querySelector('.js-filter-form')
        this.bindevents()
    }

    bindevents(){
        this.pagination.addEventListener('click',  e => {
                e.preventDefault()
                this.loadUrl(e.target.getAttribute('href'))
        })
    }

    async loadUrl (url, append = false) {
        const params = new URLSearchParams(url.split('?')[1] || '')
        params.set('ajax', 1)
        const response = await fetch(url.split('?')[0] + '?' + params.toString(), {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        if (response.status >= 200 && response.status < 300) {
            const data = await response.json()
            this.content.innerHTML = data.content
            this.pagination.innerHTML = data.pagination
            params.delete('ajax')
            history.replaceState({}, '', url.split('?')[0] + '?' + params.toString())
        }
        else {
            console.error(response)
        }
    }
}
