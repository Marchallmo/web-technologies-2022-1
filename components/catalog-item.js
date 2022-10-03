export default class CatalogList {
    constructor(el) {
        this.el = el;
        this.post = this.getPost();
        this.postsEl = el.querySelector('[data-catalog-item]');
        this.commentsEl = el.querySelector('[data-comment-items]');

        this.getItem()
        this.getComments()
    }

    getPost() {
        const url = new URL(window.location.href)

        return +url.searchParams.get('id')
    }

    async getItem() {
        const url = `https://jsonplaceholder.typicode.com/posts/${this.post}`;

        try {
            const response = await fetch(url);

            if(!response.ok)
                throw new Error('Ошибка запроса');

            const json = await response.json();

            if(json)
                this.renderPost(json);

        } catch(exception) {
            throw new Error(exception);
        }
    }

    renderPost(item) {
        this.postsEl.innerHTML = `            
            <h3 class="post-content__title">${item.title}</h3>
            
            <div class="post-content__body">
                ${item.body}
            </div>
            
            <a class="post-content__back" href="http://127.0.0.1:5500/posts.html">Назад</a> 
        `
    }

    async getComments() {
        const url = `https://jsonplaceholder.typicode.com/posts/${this.post}/comments`
        try {
            const response = await fetch(url)

            if(!response.ok)
                throw new Error('Ошибка запроса');


            const json = await response.json()

            if(json)
                this.renderComments(json)
        } catch (exception) {
            throw new Error(exception)
        }
    }

    renderComments(comments) {
        let html = ''

        comments.forEach(comment => {
            html += `
                <div class="comment-item">
                    <div class="user-info">
                        <div class="comment-item__name">
                            ${comment.name}
                        </div>
                        <div class="comment-item__email">
                            ${comment.email}
                        </div>
                    </div>
                    <div class="comment-item__body">
                        ${comment.body}
                    </div>
                </div>
            `
        })

        this.commentsEl.innerHTML = html
    }
}