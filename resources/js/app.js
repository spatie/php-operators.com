import Alpine from 'alpinejs'
import persist from '@alpinejs/persist'

Alpine.data('operators', ({ operators, currentOperatorSlug }) => ({
    operators,
    currentOperatorSlug,
    visibleOperatorsByCategory: [],
    search: '',
    init() {
        this.setVisibleOperators();

        if (this.currentOperatorSlug) {
            this.$nextTick(this.scrollToCurrent);
        }

        this.$watch('currentOperatorSlug', (currentOperatorSlug) => {
            const path = currentOperatorSlug ? `/operators/${currentOperatorSlug}` : '/';
            window.history.replaceState({}, null, path);
        });

        this.$watch('search', () => {
            this.setVisibleOperators();
        });
    },
    setVisibleOperators() {
        const operators = this.search
            ? this.operators.filter((operator) => [...operator.tags, operator.title].join(' ').includes(this.search))
            : this.operators;

        this.visibleOperatorsByCategory = Object.groupBy(operators, (operator) => operator.category);
    },
    selectOperator(slug) {
        if (this.currentOperatorSlug === slug) {
            this.currentOperatorSlug = '';
        } else {
            this.currentOperatorSlug = slug;
        }
    },
    random() {
        this.currentOperatorSlug = this.operators[Math.floor(Math.random() * this.operators.length)].slug;

        this.$nextTick(this.scrollToCurrent);
    },
    scrollToCurrent() {
        window.scrollTo(0, document.querySelector('[data-operator-contents]').offsetTop - 300);
    },
}));

Alpine.plugin(persist);
Alpine.start();
