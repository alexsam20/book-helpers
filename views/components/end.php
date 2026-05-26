        <script src="/assets/js/flowbite.min.js"></script>
        <script src="/assets/js/dark.js"></script>
        <script src="/assets/js/htmx.min.js"></script>
        <script>
            function executeCode(codeId, outputId) {
                const codeContainer = document.getElementById(codeId);
                const outputContainer = document.getElementById(outputId);
                if (!codeContainer || !outputContainer) return;

                outputContainer.style.display = 'block';
                outputContainer.innerHTML = '';

                const codeRun = codeContainer.textContent;

                const customLog = (...args) => {
                    const text = args.map(arg => typeof arg === 'object' ? JSON.stringify(arg, null, 2) : arg).join(' ');
                    outputContainer.innerHTML += text + '\n';
                };

                try {
                    const runner = new Function('console', `
                                try {
                                    ${codeRun}
                                } catch (err) {
                                    throw err;
                                }
                            `);
                    runner({ log: customLog, error: customLog, warn: customLog });

                    if (outputContainer.innerHTML === '') {
                        outputContainer.innerHTML = '<span style="color: #0c562d;">// The code run successfully, but didn\'t output anything</span>';
                    }
                } catch (error) {
                    outputContainer.innerHTML = `<span style="color: #ff6b6b;">Error: ${error.message}</span>`;
                }
            }
        </script>
        <!--<script src="/assets/js/sweetalert2.js"></script>-->
        <!--<script src="/assets/js/script.js"></script>
        <script src="/assets/js/prism.min.js"></script>-->
    </body>
</html>
