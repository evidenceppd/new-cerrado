document.write(`
    <style>
        .elementIcom {
            top: 288px;
            cursor: pointer;
            pointer-events: auto;
            background: #003087;
            height: 42px;
            max-width: 300px;
            padding: 0 4.5px;
            border: 1px solid #FFFFFF;
            border-color: #FFFFFF !important;
            border-radius: 0px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            border-right: none;
            margin: 0px;
            transition: border-radius 0.3s ease-out;
            border-top-left-radius: 12px;
            border-bottom-left-radius: 12px;
            position: fixed;
            z-index: 999999; /* Ensure it's below .blxObu */
            right: 0px;
            transition: max-width 0.5s ease-out;
        }

        .textTransition {
            all: initial;
            font-style: normal;
            font-variant: normal;
            text-transform: none;
            text-decoration: none;
            font-family: "Lato", sans-serif !important;
            color: #FFFFFF;
            order: -1;
            max-width: 0;
            font-size: 12px;
            font-weight: 700;
            overflow: hidden;
            box-sizing: border-box;
            transition: max-width 0.5s ease-out, opacity 0.5s ease-out;
            white-space: nowrap;
            opacity: 0;
        }

        .elementIcom:hover .textTransition {
            max-width: 300px;
            opacity: 1;
            padding: 0 6px 0 4px;
        }

        .iconTransition {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px; 
            height: 32px;
        }
    </style>
    <a title="Ativar ICOM" alt="ICOM" href="https://call.icom-libras.com.br/tokiomarine/autentica?uId=058f6f6518d53cf1805d1a7f669b4ec5293806aab6a20155c118c8a0a2c814ed&amp;svId=9ac0249b-b516-4760-84e9-cbdee6c9940e&amp;type=video" target="_blank">
        <button aria-label="Ativar ICOM" class="elementIcom">
            
            <image src="https://cdnpub.tokiomarine.com.br/portal_static/publico/padrao/4.1.0/addons/accessibility/images/icon-icom2x.png" width="32" height="32"/>                
            
            <p side="right" class="textTransition"><span class="openTransition">Atendimento com int&#xE9;rprete em libras</span></p>
        </button>
    </a>

    <script src="https://plugin.handtalk.me/web/latest/handtalk.min.js"></script>
    <script>
        var ht = new HT({
            token: "f2cf2021f0dd1015713c6dbc6e51b6ca",
            exceptions: [".elementIcom", ".textTransition"],
        });
    </script>
`);