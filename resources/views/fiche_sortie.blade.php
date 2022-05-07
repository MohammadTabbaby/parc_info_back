<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <style>
        <?php
        include '../public/css/bootstrap.min.css';
        include '../public/css/main.css';
        include '../public/js/jquery.min.js';
        include '../public/js/bootstrap.bundle.min.js';
        include '../public/js/pdf.js';
        ?>
    </style>

</head>


<body>
    <div class="page-content page-container" >
        <button class="btn btn-primary" id="download"> download pdf</button>
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-lg-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body" id="invoice"> 
                            <div id="header">
                                <div id="frenchtxt">
                                    <b>
                                        <p class="p1">REPUBLIQUE TUNISIENNE</p>
                                        <p class="p3">Ministère de la Santé</p>
                                        <p class="p5"> Hôpital Universitaire Tahar Sfar</p>
                                        <p class="p7">Mahdia</p>
                                    </b>
                                </div>
                            <img class='logo' src='data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoHCBYVFRgVFhUYGBgZGBocGhkcGRwaHBwcGhoZGhoaGRgcIS4lHB4rIRoYJjgmKy8xNTU1GiQ7QDs0Py40NTEBDAwMEA8QHhISHDEhISE0NDQxNDQxNDQ0NDQ0NDQ0NDQ0NDQ0PzQ0NDQ0MTQ0NDQ0NDQxNDQ0NDExNDQ0NDE0P//AABEIAOAA4QMBIgACEQEDEQH/xAAcAAACAgMBAQAAAAAAAAAAAAAABQQGAgMHAQj/xAA4EAACAQMDAgQDBgUEAwEAAAABAgADBBESITEFQQYiUWETcYEHFDJSkcEjQqGx0SRi8PFDcuGS/8QAGQEAAwEBAQAAAAAAAAAAAAAAAAECAwQF/8QAJBEAAwACAgIBBAMAAAAAAAAAAAECESEDMRJBMgQTIlFhcYH/2gAMAwEAAhEDEQA/AOzQhCABCEIAEIQgAQhCABCEIAEIQgAQnmZpe5ReWAiyBuhmLH6kScKpx2PrIda7qYKv3/LJdpFKWx21RQMkjHrIdz1JV4BcnjSP3kBKeFIPBwd5tr7JgEA+0yrm/RSgGunckZCAfrNtqjLuH1ZO4b9pGVxvpGSPxE+sypl9gyZUnkHdfeZ+dNlVKwM6raRnMwS7kG5yiHLF8nAz2kWjcTpl5Rk0WJHBmcVW1YxmrZGZYjKEIQAIQhAAhCEACEIQAIQhAAnhMj3N0qDJMqfWfFAXIBxAC31K6rywEjt1SmP5h/T/ADOQ9S8XEk4aJanipvzGPAHeF6nTPB/t/mSlqAjIO04Ha+K2B/FOs+Grr4tsjnyls+2R+8mn4rI0slhauoxvzxiRa1/jgZHf2nnwl0gAEek11rdc5zzzMK5X6GpNVxcuQSp1ew5mFemDgAc4zvuP8yRrVcYAOfT95mCgwxIGO8y8m/ZphIj0cLyMAcH1mx3QDJ7+010K4YndSCdiDnI/zNq8YO+ODIz+xoXPUJJ8u3zmyomSNsDH9ZlbgnUSRycY3/pBqbNkcnseIizRcUyEOG8xk61OUBGVPqfUDvNDUN0DHBG+3EnLTBVlYnB/5tHPZFEXqjsKOSASeSOPnEVvWjjqVsEoMoYsANgf8yt2jzt4+jFljtnjm0baV+0Md2RliJ0IQgAQhCABCEIAEIQgASJf3IRST9JLlD+0Hq/w8ID2gAp8TeJcZ8285n1XrbOTuZG6v1JnY7xKz5lAbqt0TNfxDNWYRjNwqGd/+z25ep0+i7EEglRtjAHE+eyZ9JeCKX+gt/KB5M7bfX5zLl+I57H1OvtnvxtNNeocbd5GZ2BJCHHz/qJ69Y58vmA9O3znC22bpJGTgKCW7DOR39jOede65UrOQrMqDbSDLX1/qbCmUAGWyD7Z/eVTpnSmqvucADLN2Al8U72J6NXRqdy5HwmbC7licKPmTOh2ztpUO6lsZbBzkyp3l9lVp0xpRRjbbV7mMuho1RGTO6EFfXH+JvcJz0RNbGVzcNwoxjcY2yfebLKqB+LVrPK9hMapwAQMlcE/TbE03rkYf8JI5z/zM5Eak6pUK+i4533x7zdZJrUk1A6tsAO3yMV0aKsQX85I53H0941sFUrpFPQBwfT3lykRQu6xfKiPT3JOBjuvzPeIrSWbqlr/AAX1lTgZV8b/AFlZtJ1w9GTHtmY9suYhs49s2xLJGEJ5PYAEIQgAQhCABCE8MANdd8CcO+1TqP8AH054Wdjv6vb/AJzPnfx/d67t/Y4ggKy75mDTwz3MsYATKYiZQAJ9C+FKbiwtk17FM6id9+w9p88kz6P8Mqn3C1LLqxTGPaZcvxHPY0ZtgAcnGNu5EiWzhX1M2kgYZRyfee/ecVRpGTsMenuJ6tJjWLONiNpxNG2dGHVLZHA06d9/TJirqqtSpBFwFfuPbkR115BoTBA3+v0iLxGmBTwcLg4X0PrNeDsm3mROix/4dXHxDnHkO/pI3TenEjW4wgGrnc49o16HXFSk9VU0+Uqo/MM950U9YImHjy9Gy1GpCQxY+v8A8mL0UUYc6gNyDvg+08tmdULEaduNpFp2esEsWBbJbf8AtOL2bjX44bAAAwBpJE3WyvgslTWw5Ujb6RZYOBhR598Kc8fOPqGoD8A98GKXsmiB1qmz0mVBg7al9fkZXado6fiQgest4OxK7YyWz6ekX9L6qtXc+UIxXGx1b+k6ZvxRi1lkW0fiOrV4qu6eh9uDuP8AqSrapNk8kj8cTKRbetnaSowCEIQAIQhADyY1GwJnIl620TYCjqFXAJ9ATPmzrdxrr1H9Xb+8+g/ENyEoVHPZGP8ASfN1VyST6kn9d45Hgxns8We4lgez2AEMRAeET6D6FVK2VrjJ/hDOOPrPnwifQ/hp/wDQW7Lg/wAPBHc49Jny/Ec9kuiwGkrqJLbkDibL6o2pdLdt2bbE127lmDISi75U7nI5JhevrQEuozzkbnftOKjdEy/ofEpqchiO4/aI/EG6IRnA2GRufrH13hKSBFJzjYbc94q6phULv+BPMVPLt+XPpL4Xh7E5dYS9iXrLuLZHViN9Bx3EsnSKfw6KIMnTR1EDuTiU1/EQq6Uq01FMNkBNiMesufTqq1NdRHBRqeB/tx2M1VJts6Obivj40miKt2pAyApO4Utv9RClWdk1FVwrHltyuecTQLVMFnKscH8Pab6CI1PSpGvGVzwfbaYNrJismqlTCMHGcMc47CO7G6VwR8Qgg7dv+4gpOS2W2KkAoOJZOmaWUnRtnYYi9k10RPENd6dB9Q1Z21Lsd/WJuiWQfS9PUrrjUrjYx14rQG3bdgpIyBzj29JVQjK6GlXyh0q2T78fOaUtEpaL86gkalXGME+hPpExyjEaSBnbMYXdR0TOgvtwOf0iXp3VzXd6bo6kKSAwx+kvit5wRSHVtWjWjU1CVm2rRta1p0EDaE8BnsACEIQAIuv2jAxVfncyWNFJ+0W5KWVTHfA/WcHInZ/tVq4tQv5nE5FZ2TVGwv6xzpDZFkm2sKj/AIEdvkDLp0HwzTBBfzH34nROmWiIAEQAfKJ0GDjdHwtdNjFJt/aT08CXhGfh/wBZ2ymvtJSCLybDBwGv4Pu05ot9BmdptLQJRt0IOoU1Gy7e+0aMsw6qXUKU/KBj094qeUOezLOnI0Y9CP39YtLPrxpyM5wcDPyzPa9SqoFTWpI2KGCXSuwVkJbnYGctGudDWuysurSwOwPtK34zf/TqA2QWGfaWS8dWQAB19O395X+uUVeg9IEllXXknJ9x+kfFLrSL4aU0myFdeHbdUoMSwLkAlTySM7xr0ZLeklWnSOo76gxzkgdvaUlvENa4Wlb0Ey6H8f0wI68PCvavprJTdHyrVF3ZWPY/1nZ9hpF8vPmWm87GltckHR8NEXB8x/xJtOiugEui75EwRKJAX8XPO7H5TM00CaTvscDG/tOGuzFZM61opUkVDqPpiTOjjClNbageTz9YiWg5TZWz2Gd416LWfSzmnjBwe5IAktDro2eJywtnD4ddtxsc5lPsKiBlRLdmBI1N+U+suPibSbRypKZwcn1z7ym9Nq1dLlKg8qhicZzj3m2MyZovYrN8MjzDAwDwT8ovep/CLDeqPxfmC+8zsOr66SgsFqac6SM595tWiWGhlOt+XUYEiNUOloT2tWO7Z5XlQo5Q9jG9o87cmJZLV8iSYusn3jARgewhCAGLcGKbw7mNm4im57yKGjmP2uA/Bp+mv9pUug0NKgnbM6p4u6clegVfswI+c5Z4gtapcomyrttyYFF36VaA4ORvLVb0QBicMtluabD+KU9ydhLF0PxxWpvoqkOucaonIHXFSbFivp/VVqJqXfbO0rPVPHZo1GT4THTtmIC9MZq6qzoEcAnOxQnCjHeUih9oKkAvRYA8HsZbrlxVSnUJZCUBI7Y7Aj1hSwgns0ViGBdlAx6SRRrKMYR29/8A7FIzgAamLHGrt+klK9RWGFDgEDnAnPSNhx1G51IBhl75+XaUnxl1TQi0KDFqtfGs91XjA9JfOqVQlLUw4XJ9tpzDwcPvF7UuXGUogsM7+uBOv6KcZt+jDkbeJntm656K1hoek+o4Gsjs3cH2ls6AqXFN3BwHTzr6P6iVK9609dioGEZjhQPX1MdeD7KqgrFlKqUOM7ZOZnXLVU2epy8CngXljKJ1CjodcYYg429PX5zKuCHI1t5TkZ+W4EjM5prqDJsBq333kk3qOqo7YJ3B/wAzGls4UbQ+sbuVHOB+8m+HqqlTksCp+hEWXdOiQMVBq9uD8406DVphWzUT5Z4k4Cnok+JaKVaBUtt6D+b2lI+6mgwCAsmwZSPXtLx1wL93bDhc8MO0qBv6aECojl9sY4YfmMrLFOMFj6ba0qqB1o6GAK5zuIz6WzhdLqVK/wA3Y+kWdMpo1HWHKKTznvGur4VFmyXwCc5zn0kTmqFT0ROsWSsDUU7qu/vFto0Xv1epUGlm29Bt9JLtDO2FhbMqLBaNxG68RJaniOqfAlCM4QhADFuIquxgxvFl4m8ljRTvENwPiJTJwWBPttKf1u2qIrMoy7H9BLr1S0U11c8hCAPnIFxoYBcbrsRJKOV1qVUEZTVnnMztunh3dMb6cg9h6y/1+noc9ott+mK9VUTfzZf5ekedAWzwX08JQXJzkSJ4z6drBKqAqrqYjkn0lstLcIgUDA4i22tQfiI5Jy559CJM6A4/adSZXGVBQNjzcDedkrsh+GHOxpods+kQ1fCdPVnGRnOJYr9EVlXUVGhRgDkCFvQ57PbanTx5GPfTk7RdSquH0susLsNJ25jpaFIY0qSQO3yi9wj5CqQ/Okcg9pztmjNf2hXRSzLLkE+X9exld8C6aVqQ+F+8MV1H5Gb/ALVqpW2opvknJB74A5kOl05no2dNBgMrO7HjE9Ljnx+n/s5lT+7r0K7ii9FyjgjS3677EH0xL/0y5FZXqI2pfhadHdW+UUdQanUpKAC2hgutuW/+TLwnbMvxivlUodzxnM4Jfi2j2uelycSb00TbAJpIqUcEn0GZjWsHZwUXCnksOPTaazbvnAcsQM4HBnq/GOzOwbOQOxHp+kl9nnybbekFBVlU7kasAAn2jDpduoGk24x+fbcxSKYYHNXBySBkdudo88N3S6NLMdWf5pDFTNXi6mqWjYXGCMD03iK2T4wBGMlQoc7gHH4Y+8aVQtq41AbjIPOMytdKYPSd6RJKfyj1xucS0vxFDLfZdFAofCchgTk42E19UX+C9NAUCDbHcd5B8NXRYBndxnhW2z/6x3XtlPn1FcAk+47gxRqia/kolvHVoIsZwzsyjAJOBG1mJ2mQ5thHVPgRTarxG6cCAGUIQgB5Il6m2ZLmquuQflEwKPfN/qCPRRF93RB3B0t2YfvG/VRhz64iC4r8jiZPstFa6u1wPKHGP0mzoPVqVs4Rn1OT5iZl1V1xknEody6tUJB78y0tAfQdDqtIqpLqM8ZMidXVwRWpnOBuvZhOadP6lbYFGrqYY2cHcEzpHQbdFohFcuvIJOSB6RNAY23WA4HkcN6af3jO9GuoihtLaAWyNvbMiomhsdpL6nTZnynKop2PMm/iOezQ9sODUbXnlBgfWe2tsRUDglxnzYG4M1i1yQTrydyMzdau1NyitjO/m3zOdmjTKb9rpy1Ign+bb9I/6NTzbUcHDNRdQPUxL9rVBtNJiNsncTK3uj9ztXRsacjHoRPVW/pVg5V+PLkk9Nphx8PhtYOD3A2Iljs7g/FrU9tCJgADGOIhvLZmVa6AozbkcZP5l9o68P3KVNbagKoQh12yf9xnFM9no878pTXRrSoiEMFY/IcT25uldPKDlTjfYj6TNHzuynJ4IO2J6qIM5B3Hmz/fMwfZihfYjDaWCEjjbfff6x/0NG8xZQcnY/t7RZoDKpAUEHGfb5xr0OqoVk1amDH+vvIYq6IHje3L2z4QE+veUnpVF6VJmQMW31Af4l98WaTRwTywHOO8rFMomum7NgsMVBwuRx7zSa/EUz7GHhXqDsVVqJOB+MkZX6R8t+amab0mCtkZ24HrNFl0copZagLEbOR27QtvjK76mRkCHBXknHeKcuhNIrKqA5C8AkCObOJKJySfcx3ZztMR5Z8iNxFFnyI3EAPYQhAAnhE9hACudeo4QnG8oF8eTOo9YoaqZxzObdSQLnMhopHNuv3LO+NXlEg2QphhryfWPeodKRmLYO5kazo00bz09SysobLB0+y6e+H1MpPYmWXp9mEYfArgjupMV9FpWdUgCgPqJak8OW5wQhT/ANSRIYE5amQAxGrvGN45VzjnQu/+YpTpiIQy5z7kxzdqhYatsIM+/wBZFdDnswuKCsNWoj3U/tI1K2GsAueOTzNgcrhkXKHnfiSaCIG18sx7/tMGjUq32iUTUoAA6gN1232iP7P71HpPQqEZpEugPcdxLl4nyVAwMb/SUi+8GPhattUCs4PlJ0/QHvPR+jua4nx1/hzck4tVjJMterli9Wo2EUnA7AdgBGngvphHxLqoTrqoxRPRCdifTO0qXReku1ylK6bSqtkoeGPv6idGsqbirWDghAhCemnbGDE1MS0nlnXz06xhYREtq7sSoQH3zx8owrqqjJHYA5PaaqdKnhecjv6/OZXrioqod9+e84G9kro0VCpbIXyEfynv7iNOhqgVipK5bg+vtFlq6owUNvnB+kfWqo2CNPO3z74ksVPQi8c1VWmgZiMuJXDVU1UAZcEbjsTnk+8s/jbp5rU0VQThwdvaV2xq2yulN182QCTyZax4ilsvtvS8gUEHYYzx/wBRff1CqVF0Y8v4l5Mm2dwjqVTOFOnA2xIvUkOGXUWGg+x+p9I420RTKjax3ZCJbYR5ZzrMx3aCNoqtY1EAPYQhAAhCEANbrkYlB8R9OIY7es6DIHU7MOvG8TQ8nIWs8tiTaHQFY5IBjfqXTihJAntldBR5tpLyNMz6Z0ZU3CiO0XG0X2vUEY4Bk4VhJGZimWYD9ZvuTqYgK3AAPIM0vclKbOoBJOBniaB1nKanGhQMFlO+odgB2kWykSlo4XQfxYHy95up099uViWl4rXWgK+U7Ekbj3+UsLEOpKYw38wmF5SLTEPigkIMnOTwIn6ypRadNQdKpkeuTzvN/ixToAVmODvElLxNVVdCumAOXUMR8jOj6b4kcumW236Olzbozglh/ONmGJI6RQKF0+M7oo4YcfWUJ/Ft0w0/ECD/AGqBmWPofiZ2CpgO2PPsMkes1ucbQ1ytrxZYqdWnrz3xg7bfKQrm4ZHwoBIOAPnvJdS/plcim3vgbibOm3dFhuRqJ4bn5zkwys4RAuqy4OpUBI3HcGHT6qMoHGk7YJ59sTe1Sk7svwS2GwWE2/Apo2QhA7bZ/wCGGPHsTeRhRuqeME4+cU9c6Qj/AMRKfnTzDA/FJd/bq4yRwQc459OJtqXwACt5dsZzJp/oJWyN0tiPOCBqXzLxv3m7qFdHR1UDXoyTxt8+8hi4pow1vqBHtt+klXNSnVQ6GC6hjUdtpXF3sVoqdtHlnIr9KCDUtVXAG+D/AEm+zM7MmI/te0aiKLR+I2U7RgZQhCABCEIAEIQgBAvunq495UOq9EYZxL9I9wyAZcqB6nA/vADkn3OrTYkAyfbVnIA3l1uEtm/8ib/7hPT0emo1bAYzkkY+eZPiPIr0A2yhzjL7fOJblE0sRu2fkMeuI48Q1EegqUHps4cH8ajA9eZg1khVddIny7sr7e8zqKTyazSwJra1QadbqUzscck9syzEKiKlI5B3znYfWV27FNMU0qI6ZzoZhlT7Scl+QFGAq9x+8xuKfo0VSL/Fl6rIgDDO+QOxlB3ySSOZZet2/mYhgQdwThfpvEIsW/Mn/wChOnhjxkx5K8ma2qbyT0p/4gIcoccjb6GZjotXnA/WCdNqI2kac44yMzVrKIl4Za6vUSFRi75BAYgbMvvNHUOphnJBXbGnC749/eQ6NKphQ3bt2nl3atnUo3I3HbMwUbNXSaJVj1qqjKNLc855HylzPUKbFH14zjUpPB9xOe0bWofx7EcRhQcqCtQBgRuc4P0MVwJNHQTcYUsBlW47yvdZtzcPhGC6B5hnG/ynnT+sWyUxTFTJHAzmRx1GgoqFn0OwJUk8nG20xcU3jBacreTWuAfMpIX05m67tUYB1dschc/t2ii1NT8TVRvyCvr3EjmjVDsVfI7MePkBLniaFVpjNKq50hlPHH7xtaNKvbU63xAzIgXhiP7yz2om0poyp5HlseI5pNkCJLWObc+USyTdCEIAEIQgAQhCABOdfbQxFkmDj+Ks6LKP9qN5TpWqtUpiopqKMEkAZ77Rz2BRulWbN8PNK3wdBJNTDdt+eZ0vxHfU/ulZFdda0T5Q248v6zkK9ctlBY2qsikZKs3tx7zotiOn1qL3qFRqTS+W3G2NOPXaaUkJHNeh2lStakJQ1sxIFTUcj6S522afTWo1bj+IqHUVOWXPAMRJ4xS0ylG3X4YbksfLnuY88IXNK8e4cUUVtI1MpJDat+8H/IYKNUpaKJfUjrnJbOH2Pzl66NdU3o0/PguuysfMZE6ra9PpsQ5GQdwM/wBpkvUun6kdsgpjSdJAGI2vJdAT+pdLWoBrXONxKH4ctUd7gOMqmSPYDM6l07qNvc6hScORyOCPpKHf9Wp2lxWpLSTVjfJOWzJnQCi58RVkUujZAIAGNsTbcO73yFGCs1NT7bjJ2jVEsnRWKnLAEgKSBntmMemvYvVXS4DgBV1bHbbEp4AS2fXqgFwrsuabYViPpxIlr4grfFpqTlXO+Rjb2lyvejW1IvrAy+5HJPviIqSWOvIDEqeQpOD+0Fj9AR+lXVxcVqiB1Vabem+I18V0QKIBcpkjcDn5xdU6/QtaxFJFOtdRZtQJPpiWO/vVew+8sikYzpPHOOYsbA5/cfwgjNhlDDzIcNue8zr03qXgQvkFNQyNgAM4Ijrw9Rp3NbQaKrhdQ3J/oY9vktKNXW7AOBjbfbGMbSn2JFMvev1VDsjAhNhgeXb1k2t1mu9SgiFV+IgJ27mTKrdPcknvk8HH6Rx0W0s6zp8JgzoNhwQPaKtehjTpdq6oA7B27nEc0KMlU7TEkU7eYsYUEjeiuAJot7fHMlwA9hCEACEIQAIQhAAlQ+0XoBvLYUw2nDhv0lvmDKDzBAcp8O+B9FJ0fzq/txiK6XgF6etUrFQx/Dvj549Z2pUA2AmLUFJzjeVkDll94DBtPgoSCWDO5G7Eesa/Z54Ua0FTz5DgAeonQGQEY7QVAOBDyA5N4g8Fu7kipy2ckY+m0hV/AblfM6/Qb/1nZHoqeRPPu6+kf3H0LBzHwP4Ve2rGoHDBlwwIOcdsRd4p8DNWunq68auNp2CnRVeBieNQUnJEWQK10roxSgiaVOlACcDcgczntv4BZbnX8T/yF8Y9Wzj2nawJr+7rnOIZAonijw78Yh1Z0fSFJHp+0WdI8PXVJNFOsmnJPmTUd9+Z1BqYOxExW3UdoKmGDjHXfAtSrVFR6oZiN8LpH0EtNTw0zdNNtq3K41fXMvzWynkTI0hjGNoeTDBy3wP4Te2rFy5fyFcczHxN4Qaq7MKm7HO43HtOppQUcCD0FPIgraDBxs+BHKYaouMcgbyZ4Q8Hvb3K1VcHGQQRyDOrfdl9J6lBV3Ajq2wwYLbCblpgdpnCQM8nsIQAIQhAD//Z' />
                                <div id="arabictxt">
                                    <b>
                                        <p class="p2">الجمهوريـة التونسيـة </p>
                                        <p class="p4">وزارة الصحــة</p>
                                        <p class="p6"> المستشفى الجامعي الطاهر صفر</p>
                                        <p class="p8"> بالمهدية</p>
                                    </b>
                                </div>
                            </div>
                            <hr size="8" />

                            <div class="row container d-flex justify-content-center">
                                <h2 id="title"> Bon de sortie de matériel informatique </h2><br>
                                <br><br>

                            </div>
                            <p class="date">Date : {{$array['date']}}</p>
                            <br><br>
                            <div class="card-body">
                                <div class=" table-responsive">
                                    <table class="table" border="2">
                                        <thead>
                                            <tr>
                                                
                                                <th>Désignation </th>
                                                <th>Service / Unité</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($array['equipements'] as $v)
                                            <tr>
                                                @if(isset($v['reference'])&& (isset($v['modele']->nom_modele))&&(isset($v['categorie']->nom_categorie)))
                                                <td> {{$v['categorie']->nom_categorie}} {{$v['modele']->nom_modele	}} {{$v['reference']}} </td>
                                                @else
                                                        <td></td>
                                                    @endif
                                                    @if(isset($v['service']->nom_service))
                                                <td>{{$v['service']->nom_service}} </td>
                                                @else
                                                        <td></td>
                                                    @endif
                                                </tr>
                                                @endforeach 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="midsec">
                                <div id="livre">
                                    <p>Livré par :</p>
                                    <p>Rami MANÂA</p>
                                </div>
                                <div id="fourniss">
                                    <p>Entreprise :</p>
                                    <p> @if(isset($array['fournisseur'])) {{$array['fournisseur']}} @endif</p>
                                </div>
                            </div>
                            <br><br>
                            <div id="botsec">
                                <h6> Nombre total des équipements :@if(isset($array['total'])) {{$array['total']}} @else 0 @endif</h6>
                                <div id="signa">
                                    <h6>signature </h6>
                                    <p>.................</p>
                                </div>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                        <hr>
                        <div id="footer">
                            <p>العنوان : دار واجة هيبون المهدية 5100 - الهاتف : 744 671 73 - الفاكس : 579 671 73</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
<script>
    window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("invoice");
            console.log(invoice);
            console.log(window);
            var opt = {
                margin: 1,
                filename: 'fiche_sortie.pdf',
                image: { type: 'jpeg', quality: 1 },
                html2canvas: { scale: 2.5 },
                jsPDF: { unit: 'pt', format: 'a4', orientation: 'p' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
}
</script>

</html>