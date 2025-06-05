<footer @class([ 'w-full z-[100] text-left py-[10vh] ' , 'bg-[rgb(186,186,186)]'=> ($footerStyle ?? '') === 'grey',
    'text-white' => ($footerColor ?? '') === 'footer-white',
    'text-black' => ($footerColor ?? '') === 'footer-black',
    'pb-0' => ($footerStyle ?? '') === 'grey',
    'mt-0' => ($footerStyle ?? '') === 'grey',
    
    'mt-[5vh]' => ($footerColor ?? '') === 'footer-white' || (
    ($footerColor ?? '') === 'footer-black' && ($footerStyle ?? '') !== 'grey'
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