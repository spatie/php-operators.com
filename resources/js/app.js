window.Alpine.data('operators', ({ operators, currentOperatorSlug }) => ({
    operators,
    currentOperatorSlug,
    operatorsByCategory: [],
    search: '',
    init() {
        console.log(this.operators)
        this.operatorsByCategory = Object.groupBy(this.operators, (operator) => operator.category);

        this.$nextTick(this.scrollToCurrent);

        this.$watch('currentOperatorSlug', () => {
            const path = this.currentOperatorSlug ? `/operators/${this.currentOperatorSlug}` : '/';
            window.history.replaceState({}, null, path);
        });

        this.$watch('search', () => {
            const operators = this.search
                ? this.operators.filter((operator) => [...operator.tags, operator.title].join(' ').includes(this.search))
                : this.operators;

            this.operatorsByCategory = Object.groupBy(operators, (operator) => operator.category);
        });
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
