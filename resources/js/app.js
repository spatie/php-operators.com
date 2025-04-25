import Alpine from 'alpinejs';
import persist from '@alpinejs/persist';

Alpine.data('operators', ({ operators, currentOperatorSlug, empty }) => ({
    operators,
    currentOperatorSlug,
    empty,
    visibleOperatorsByCategory: [],
    search: '',
    badJokes: [
        "Have you heard the one about the statistician? Probably.",
        "Why do plants hate math? Because it gives them square roots.",
        "Which snakes are good at math? Adders.",
        "How do you solve any equation? Multiply both sides by zero.",
        "Do you know what’s odd? Every other number!",
        "What are ten things you can always count on? Your fingers.",
    ],
    currentJoke: '',
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

        this.empty = operators.length === 0;

        if (this.empty) {
            this.currentJoke = this.badJokes[Math.floor(Math.random() * this.badJokes.length)];
        }

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
