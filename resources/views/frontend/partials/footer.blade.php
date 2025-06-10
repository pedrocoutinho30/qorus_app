<footer @class([ 'w-full z-[100] text-left pb-8 pt-4' , 'bg-[rgb(186,186,186)]'=> ($footerStyle ?? '') === 'grey',
    'bg-[rgb(28,28,28)]'=> ($footerStyle ?? '') === 'grey-contacts',
    'pt-[5vh]' => ($footerStyle ?? '') === 'grey-contacts',

    'text-white' => ($footerColor ?? '') === 'footer-white',
    'text-black' => ($footerColor ?? '') === 'footer-black',
    'mt-0' => ($footerStyle ?? '') === 'grey',
    'mt-[5vh]' => (!in_array(($footerStyle ?? ''), ['grey', 'grey-contacts'])
    ),

    'font-aeonik',
    ])>
    <div @class([ 'h-[2px] mx-auto' , 'w-[calc(100%-10vh)] md:w-[calc(100%-10vh)]' , 'bg-white'=> ($footerColor ?? '') === 'footer-white',
        'bg-black' => ($footerColor ?? '') === 'footer-black',
        ])></div>

    <div class="mt-[5px] ml-[9vh] md:ml-[5vh] text-[14px]">
        2025 © Qorus Group
    </div>
</footer>