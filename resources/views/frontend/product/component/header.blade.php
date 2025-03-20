<div class="row align-items-center">
            <div class="col-12 collection-heading_title">

              <div class="heading-collection">
                <h1 class="title">
                  {{ $category->name }} </h1>
              </div>


            </div>
            <div class="d-lg-none col-12 col-lg-4 col-xl-3 collection-heading_options">
              <div class="collection-options-desktop d-flex justify-content-lg-end align-items-center collection-options-desktop_filter">
                <div class="collection-options-filter mr-lg-4">
                  <a href="javascript:;" class="js-collection-options-filter d-flex align-items-center">
                    <span class="options-filter-title">Bộ lọc</span>
                    <span class="options-filter-box-icon">
                      <svg class="icon-filter-collections" aria-labelledby="icon-filters">
                        <path d="M13.0071429,11.6454121 C13.9865414,11.6454121 14.8197845,12.2509576 15.1288623,13.0962538 L17.475,13.0969414 C17.7649495,13.0969414 18,13.3319919 18,13.6219414 L18,13.9118146 C18,14.2017641 17.7649495,14.4368146 17.475,14.4368146 L15.1664412,14.4366893 C14.8925267,15.3402237 14.0294572,16 13.0071429,16 C11.9848285,16 11.121759,15.3402237 10.8478446,14.4366893 L0.524999991,14.4368146 C0.235050502,14.4368146 -3.51720511e-15,14.2017641 -3.55271368e-15,13.9118146 L-3.55271368e-15,13.6219414 C-3.58822225e-15,13.3319919 0.235050502,13.0969414 0.524999991,13.0969414 L10.8854234,13.0962538 C11.1945013,12.2509576 12.0277443,11.6454121 13.0071429,11.6454121 Z M3.56868134,6.38034864 C4.47896885,6.38034864 5.26299991,6.90344895 5.61727348,7.65595581 L17.475,7.65641836 C17.7649495,7.65641836 18,7.89146886 18,8.18141835 L18,8.47129156 C18,8.76124105 17.7649495,8.99629155 17.475,8.99629155 L5.77283806,8.99706359 C5.56278707,9.98891044 4.65576532,10.7349365 3.56868134,10.7349365 C2.48159737,10.7349365 1.57457561,9.98891044 1.36452462,8.99706359 L0.524999991,8.99629155 C0.235050502,8.99629155 -3.51720511e-15,8.76124105 -3.55271368e-15,8.47129156 L-3.55271368e-15,8.18141835 C-3.58822225e-15,7.89146886 0.235050502,7.65641836 0.524999991,7.65641836 L1.5200892,7.65595581 C1.87436277,6.90344895 2.65839383,6.38034864 3.56868134,6.38034864 Z M12.7994507,4.4408921e-16 C13.7788493,4.4408921e-16 14.6120923,0.60554546 14.9211702,1.45084169 L17.475,1.45152929 C17.7649495,1.45152929 18,1.68657979 18,1.97652928 L18,2.26640249 C18,2.55635198 17.7649495,2.79140248 17.475,2.79140248 L14.958749,2.79127719 C14.6848346,3.69481158 13.8217651,4.35458787 12.7994507,4.35458787 C11.7771364,4.35458787 10.9140669,3.69481158 10.6401524,2.79127719 L0.524999991,2.79140248 C0.235050502,2.79140248 -3.38844167e-15,2.55635198 -3.55271368e-15,2.26640249 L-3.55271368e-15,1.97652928 C-3.58822225e-15,1.68657979 0.235050502,1.45152929 0.524999991,1.45152929 L10.6777313,1.45084169 C10.9868091,0.60554546 11.8200521,4.4408921e-16 12.7994507,4.4408921e-16 Z" transform="translate(6.000000, 7.000000)"></path>
                      </svg>
                      <svg class="icon-filter-close" aria-labelledby="icon-filters-close">
                        <path d="M21.651829,9.348171 C21.925196,9.62153801 21.925196,10.0647535 21.651829,10.3381205 L16.4899495,15.5 L21.651829,20.6618795 C21.925196,20.9352465 21.925196,21.378462 21.651829,21.651829 C21.378462,21.925196 20.9352465,21.925196 20.6618795,21.651829 L15.5,16.4899495 L10.3381205,21.651829 C10.0647535,21.925196 9.62153801,21.925196 9.348171,21.651829 C9.074804,21.378462 9.074804,20.9352465 9.348171,20.6618795 L14.5100505,15.5 L9.348171,10.3381205 C9.074804,10.0647535 9.074804,9.62153801 9.348171,9.348171 C9.62153801,9.074804 10.0647535,9.074804 10.3381205,9.348171 L15.5,14.5100505 L20.6618795,9.348171 C20.9352465,9.074804 21.378462,9.074804 21.651829,9.348171 Z"></path>
                      </svg>
                    </span>
                  </a>
                </div>
                <div class="collection-options-sortby collection-sortby collection-sortby-option">
                  <div class="collection-sortby-title js-sortby-title d-flex align-items-center">
                    <span class="title-sort"></span>
                    <span class="sort-by-icon">
                      <svg class="icon-sort-by" aria-labelledby="sort-by-dropdown">
                        <path d="M22.4960571,11.5078274 C22.7675921,11.7793624 22.7675921,12.2196077 22.4960571,12.4911427 L15.4914,19.4961248 C15.219865,19.7676598 14.7796197,19.7676598 14.5080847,19.4961248 L7.50335959,12.4913996 C7.23182458,12.2198646 7.23182458,11.7796194 7.50335959,11.5080844 C7.77489459,11.2365494 8.21513981,11.2365494 8.48667481,11.5080844 L14.9995799,18.0209894 L21.5127419,11.5078274 C21.7842769,11.2362924 22.2245221,11.2362924 22.4960571,11.5078274 Z"></path>
                      </svg>
                    </span>
                  </div>
                  <div class="collection-sortby-custom collection-sortby-custom_option collection-siderbar-options_mb">
                    <div class="collection-options_fixed-mb">
                      <div class="collection-sortby-close_mb sidebar-options-close">
                        <span class="collection-sortby-title sidebar-options-title">Sắp xếp</span>
                        <div class="back-icon_sortby back-icon">
                          <svg class="icon-sortby-back" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve">
                            <g>
                              <g>
                                <path d="M284.286,256.002L506.143,34.144c7.811-7.811,7.811-20.475,0-28.285c-7.811-7.81-20.475-7.811-28.285,0L256,227.717
																			 L34.143,5.859c-7.811-7.811-20.475-7.811-28.285,0c-7.81,7.811-7.811,20.475,0,28.285l221.857,221.857L5.858,477.859
																			 c-7.811,7.811-7.811,20.475,0,28.285c3.905,3.905,9.024,5.857,14.143,5.857c5.119,0,10.237-1.952,14.143-5.857L256,284.287
																			 l221.857,221.857c3.905,3.905,9.024,5.857,14.143,5.857s10.237-1.952,14.143-5.857c7.811-7.811,7.811-20.475,0-28.285
																			 L284.286,256.002z" />
                              </g>
                            </g>
                          </svg>
                        </div>
                      </div>
                    </div>
                    <ul class="custom-select-menu sort-by">

                      <li><span data-value="manual">Sản phẩm nổi bật</span></li>
                      <li><span data-value="price-ascending" data-filter="&amp;sortby=(price:product=asc)">Giá: Tăng dần</span></li>
                      <li><span data-value="price-descending" data-filter="&amp;sortby=(price:product=desc)">Giá: Giảm dần</span></li>
                      <li><span data-value="title-ascending" data-filter="&amp;sortby=(title:product=asc)">Tên: A-Z</span></li>
                      <li><span data-value="title-descending" data-filter="&amp;sortby=(price:product=desc)">Tên: Z-A</span></li>
                      <li><span data-value="created-ascending" data-filter="&amp;sortby=(updated_at:product=desc)">Cũ nhất</span></li>
                      <li><span data-value="created-descending" data-filter="&amp;sortby=(updated_at:product=asc)">Mới nhất</span></li>
                      <li><span data-value="best-selling" data-filter="&amp;sortby=(sold_quantity:product=desc)">Bán chạy nhất</span></li>
                      <li><span data-value="quantity-descending">Tồn kho: Giảm dần</span></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 fixed_filter">
              <div class="wrapper-layered-filter desktop-filter">
                <div class="layered-filter-container">
                  <div class="layered-filter-group">
                    <div class="collection-options-sortby filter-trai collection-sortby collection-sortby-option">
                      <div class="collection-sortby-title js-sortby-title filter-trai d-flex align-items-center">
                        <span class="title-sortx">Bộ lọc</span>
                        <span class="sort-by-icon">
                          <svg class="icon-filter-collections" aria-labelledby="icon-filters">
                            <path d="M13.0071429,11.6454121 C13.9865414,11.6454121 14.8197845,12.2509576 15.1288623,13.0962538 L17.475,13.0969414 C17.7649495,13.0969414 18,13.3319919 18,13.6219414 L18,13.9118146 C18,14.2017641 17.7649495,14.4368146 17.475,14.4368146 L15.1664412,14.4366893 C14.8925267,15.3402237 14.0294572,16 13.0071429,16 C11.9848285,16 11.121759,15.3402237 10.8478446,14.4366893 L0.524999991,14.4368146 C0.235050502,14.4368146 -3.51720511e-15,14.2017641 -3.55271368e-15,13.9118146 L-3.55271368e-15,13.6219414 C-3.58822225e-15,13.3319919 0.235050502,13.0969414 0.524999991,13.0969414 L10.8854234,13.0962538 C11.1945013,12.2509576 12.0277443,11.6454121 13.0071429,11.6454121 Z M3.56868134,6.38034864 C4.47896885,6.38034864 5.26299991,6.90344895 5.61727348,7.65595581 L17.475,7.65641836 C17.7649495,7.65641836 18,7.89146886 18,8.18141835 L18,8.47129156 C18,8.76124105 17.7649495,8.99629155 17.475,8.99629155 L5.77283806,8.99706359 C5.56278707,9.98891044 4.65576532,10.7349365 3.56868134,10.7349365 C2.48159737,10.7349365 1.57457561,9.98891044 1.36452462,8.99706359 L0.524999991,8.99629155 C0.235050502,8.99629155 -3.51720511e-15,8.76124105 -3.55271368e-15,8.47129156 L-3.55271368e-15,8.18141835 C-3.58822225e-15,7.89146886 0.235050502,7.65641836 0.524999991,7.65641836 L1.5200892,7.65595581 C1.87436277,6.90344895 2.65839383,6.38034864 3.56868134,6.38034864 Z M12.7994507,4.4408921e-16 C13.7788493,4.4408921e-16 14.6120923,0.60554546 14.9211702,1.45084169 L17.475,1.45152929 C17.7649495,1.45152929 18,1.68657979 18,1.97652928 L18,2.26640249 C18,2.55635198 17.7649495,2.79140248 17.475,2.79140248 L14.958749,2.79127719 C14.6848346,3.69481158 13.8217651,4.35458787 12.7994507,4.35458787 C11.7771364,4.35458787 10.9140669,3.69481158 10.6401524,2.79127719 L0.524999991,2.79140248 C0.235050502,2.79140248 -3.38844167e-15,2.55635198 -3.55271368e-15,2.26640249 L-3.55271368e-15,1.97652928 C-3.58822225e-15,1.68657979 0.235050502,1.45152929 0.524999991,1.45152929 L10.6777313,1.45084169 C10.9868091,0.60554546 11.8200521,4.4408921e-16 12.7994507,4.4408921e-16 Z" transform="translate(6.000000, 7.000000)"></path>
                          </svg>
                        </span>
                      </div>
                      <div class="collection-sortby-custom collection-sortby-custom_option">
                        <!-- ./filter brand -->
                        <div class="filter-group">
                          <div class="filter-group-block">
                            <div class="filter-group-subtitle tr01">
                              <span>Bộ sưu tập</span>
                              <span class="icon-control">
                                <i id="icon-plus-1" class="fa fa-plus" aria-hidden="true"></i>
                                <i id="icon-minus-1" class="fa fa-minus" aria-hidden="true"></i>
                              </span>
                            </div>
                            <div id="filter-brand" class="filter-group-content filter-brand">
                              <ul class="checkbox-list">

                                <li>
                                  <input type="checkbox" id="data-brand-p1" value="Art Stage Collection" name="brand-filter" data-vendor="(vendor:product=Art Stage Collection)" />
                                  <label for="data-brand-p1">Art Stage Collection</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p2" value="Broome Street 4913L" name="brand-filter" data-vendor="(vendor:product=Broome Street 4913L)" />
                                  <label for="data-brand-p2">Broome Street 4913L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p3" value="Carnivale Collection" name="brand-filter" data-vendor="(vendor:product=Carnivale Collection)" />
                                  <label for="data-brand-p3">Carnivale Collection</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p4" value="Champagne Pearls 4811J" name="brand-filter" data-vendor="(vendor:product=Champagne Pearls 4811J)" />
                                  <label for="data-brand-p4">Champagne Pearls 4811J</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p5" value="Chelsea Estate 1779L" name="brand-filter" data-vendor="(vendor:product=Chelsea Estate 1779L)" />
                                  <label for="data-brand-p5">Chelsea Estate 1779L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p6" value="Cher Blanc 1655L" name="brand-filter" data-vendor="(vendor:product=Cher Blanc 1655L)" />
                                  <label for="data-brand-p6">Cher Blanc 1655L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p7" value="Coco Fleur 4960L" name="brand-filter" data-vendor="(vendor:product=Coco Fleur 4960L)" />
                                  <label for="data-brand-p7">Coco Fleur 4960L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p8" value="Crestwood Gold 4167L" name="brand-filter" data-vendor="(vendor:product=Crestwood Gold 4167L)" />
                                  <label for="data-brand-p8">Crestwood Gold 4167L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p9" value="Crochet 4966L" name="brand-filter" data-vendor="(vendor:product=Crochet 4966L)" />
                                  <label for="data-brand-p9">Crochet 4966L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p10" value="English Herbs 4942L" name="brand-filter" data-vendor="(vendor:product=English Herbs 4942L)" />
                                  <label for="data-brand-p10">English Herbs 4942L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p11" value="Eternal Collection" name="brand-filter" data-vendor="(vendor:product=Eternal Collection)" />
                                  <label for="data-brand-p11">Eternal Collection</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p12" value="Eternal Palace 1717L" name="brand-filter" data-vendor="(vendor:product=Eternal Palace 1717L)" />
                                  <label for="data-brand-p12">Eternal Palace 1717L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p13" value="Eternal Palace Gold 1728L" name="brand-filter" data-vendor="(vendor:product=Eternal Palace Gold 1728L)" />
                                  <label for="data-brand-p13">Eternal Palace Gold 1728L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p14" value="Evening Majesty 4818J" name="brand-filter" data-vendor="(vendor:product=Evening Majesty 4818J)" />
                                  <label for="data-brand-p14">Evening Majesty 4818J</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p15" value="Flanders Gold 1714L" name="brand-filter" data-vendor="(vendor:product=Flanders Gold 1714L)" />
                                  <label for="data-brand-p15">Flanders Gold 1714L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p16" value="Flanders Platinum 1715L" name="brand-filter" data-vendor="(vendor:product=Flanders Platinum 1715L)" />
                                  <label for="data-brand-p16">Flanders Platinum 1715L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p17" value="Forever Fields 4950L" name="brand-filter" data-vendor="(vendor:product=Forever Fields 4950L)" />
                                  <label for="data-brand-p17">Forever Fields 4950L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p18" value="Galaxy L554L" name="brand-filter" data-vendor="(vendor:product=Galaxy L554L)" />
                                  <label for="data-brand-p18">Galaxy L554L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p19" value="Glacier Platinum 1702L" name="brand-filter" data-vendor="(vendor:product=Glacier Platinum 1702L)" />
                                  <label for="data-brand-p19">Glacier Platinum 1702L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p20" value="Gloria L553L" name="brand-filter" data-vendor="(vendor:product=Gloria L553L)" />
                                  <label for="data-brand-p20">Gloria L553L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p21" value="Hampshire Gold 4335L" name="brand-filter" data-vendor="(vendor:product=Hampshire Gold 4335L)" />
                                  <label for="data-brand-p21">Hampshire Gold 4335L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p22" value="Hampshire Platinum 4336L" name="brand-filter" data-vendor="(vendor:product=Hampshire Platinum 4336L)" />
                                  <label for="data-brand-p22">Hampshire Platinum 4336L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p23" value="Hana Sarasa 4409L" name="brand-filter" data-vendor="(vendor:product=Hana Sarasa 4409L)" />
                                  <label for="data-brand-p23">Hana Sarasa 4409L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p24" value="Hertford 4861L" name="brand-filter" data-vendor="(vendor:product=Hertford 4861L)" />
                                  <label for="data-brand-p24">Hertford 4861L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p25" value="Hyozaemon Chopstick" name="brand-filter" data-vendor="(vendor:product=Hyozaemon Chopstick)" />
                                  <label for="data-brand-p25">Hyozaemon Chopstick</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p26" value="Islay 4885L" name="brand-filter" data-vendor="(vendor:product=Islay 4885L)" />
                                  <label for="data-brand-p26">Islay 4885L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p27" value="Jardin Fleuri 4910L" name="brand-filter" data-vendor="(vendor:product=Jardin Fleuri 4910L)" />
                                  <label for="data-brand-p27">Jardin Fleuri 4910L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p28" value="Kyoka Shunsai 1620L" name="brand-filter" data-vendor="(vendor:product=Kyoka Shunsai 1620L)" />
                                  <label for="data-brand-p28">Kyoka Shunsai 1620L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p29" value="Odessa Cobalt Platinum 4922L" name="brand-filter" data-vendor="(vendor:product=Odessa Cobalt Platinum 4922L)" />
                                  <label for="data-brand-p29">Odessa Cobalt Platinum 4922L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p30" value="Odessa Gold 4874L" name="brand-filter" data-vendor="(vendor:product=Odessa Gold 4874L)" />
                                  <label for="data-brand-p30">Odessa Gold 4874L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p31" value="Odessa Platinum 4875L" name="brand-filter" data-vendor="(vendor:product=Odessa Platinum 4875L)" />
                                  <label for="data-brand-p31">Odessa Platinum 4875L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p32" value="Orchard Garden 4911L" name="brand-filter" data-vendor="(vendor:product=Orchard Garden 4911L)" />
                                  <label for="data-brand-p32">Orchard Garden 4911L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p33" value="Princess Bouquet Gold 1660L" name="brand-filter" data-vendor="(vendor:product=Princess Bouquet Gold 1660L)" />
                                  <label for="data-brand-p33">Princess Bouquet Gold 1660L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p34" value="Princess Bouquet Platinum 1661L" name="brand-filter" data-vendor="(vendor:product=Princess Bouquet Platinum 1661L)" />
                                  <label for="data-brand-p34">Princess Bouquet Platinum 1661L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p35" value="Rochelle Gold 4796L" name="brand-filter" data-vendor="(vendor:product=Rochelle Gold 4796L)" />
                                  <label for="data-brand-p35">Rochelle Gold 4796L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p36" value="Rochelle Platinum 4795L" name="brand-filter" data-vendor="(vendor:product=Rochelle Platinum 4795L)" />
                                  <label for="data-brand-p36">Rochelle Platinum 4795L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p37" value="Trefolio Gold 4945L" name="brand-filter" data-vendor="(vendor:product=Trefolio Gold 4945L)" />
                                  <label for="data-brand-p37">Trefolio Gold 4945L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p38" value="Trefolio Platinum 4957L" name="brand-filter" data-vendor="(vendor:product=Trefolio Platinum 4957L)" />
                                  <label for="data-brand-p38">Trefolio Platinum 4957L</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p39" value="Yamaco Auroma" name="brand-filter" data-vendor="(vendor:product=Yamaco Auroma)" />
                                  <label for="data-brand-p39">Yamaco Auroma</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p40" value="Yamaco Byzantine G/A" name="brand-filter" data-vendor="(vendor:product=Yamaco Byzantine G/A)" />
                                  <label for="data-brand-p40">Yamaco Byzantine G/A</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p41" value="Yamaco Crystal Line" name="brand-filter" data-vendor="(vendor:product=Yamaco Crystal Line)" />
                                  <label for="data-brand-p41">Yamaco Crystal Line</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p42" value="Yamaco Crystal Line G/A" name="brand-filter" data-vendor="(vendor:product=Yamaco Crystal Line G/A)" />
                                  <label for="data-brand-p42">Yamaco Crystal Line G/A</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p43" value="Yamaco Elegance" name="brand-filter" data-vendor="(vendor:product=Yamaco Elegance)" />
                                  <label for="data-brand-p43">Yamaco Elegance</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p44" value="Yamaco Elegance G/A" name="brand-filter" data-vendor="(vendor:product=Yamaco Elegance G/A)" />
                                  <label for="data-brand-p44">Yamaco Elegance G/A</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p45" value="Yamaco Flora" name="brand-filter" data-vendor="(vendor:product=Yamaco Flora)" />
                                  <label for="data-brand-p45">Yamaco Flora</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p46" value="Yamaco Gem" name="brand-filter" data-vendor="(vendor:product=Yamaco Gem)" />
                                  <label for="data-brand-p46">Yamaco Gem</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p47" value="Yamaco Gone Fishin" name="brand-filter" data-vendor="(vendor:product=Yamaco Gone Fishin)" />
                                  <label for="data-brand-p47">Yamaco Gone Fishin</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p48" value="Yamaco Stanford G/A" name="brand-filter" data-vendor="(vendor:product=Yamaco Stanford G/A)" />
                                  <label for="data-brand-p48">Yamaco Stanford G/A</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p49" value="Yamazaki Cache G/A" name="brand-filter" data-vendor="(vendor:product=Yamazaki Cache G/A)" />
                                  <label for="data-brand-p49">Yamazaki Cache G/A</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-brand-p50" value="Yoshino 9983J" name="brand-filter" data-vendor="(vendor:product=Yoshino 9983J)" />
                                  <label for="data-brand-p50">Yoshino 9983J</label>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <!-- ./filter type -->
                        <div class="filter-group">
                          <div class="filter-group-block">
                            <div class="filter-group-subtitle tr02">
                              <span>Phong cách thiết kế</span>
                              <span class="icon-control">
                                <i id="icon-plus-2" class="fa fa-plus" aria-hidden="true"></i>
                                <i id="icon-minus-2" class="fa fa-minus" aria-hidden="true"></i>
                              </span>
                            </div>
                            <div id="filter-size5" class="filter-group-content filter-size5">
                              <ul class="checkbox-list">

                                <li>
                                  <input type="checkbox" id="data-size5-p1" value="Art Stage Style" name="size5-filter" data-size5="(product_type:product=Art Stage Style)" />
                                  <label for="data-size5-p1">Art Stage Style</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-size5-p2" value="Carnivale style" name="size5-filter" data-size5="(product_type:product=Carnivale style)" />
                                  <label for="data-size5-p2">Carnivale style</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-size5-p3" value="Casual style (Orchard Garden, English Herbs, Harvest Dream, Totoro)" name="size5-filter" data-size5="(product_type:product=Casual style (Orchard Garden, English Herbs, Harvest Dream, Totoro))" />
                                  <label for="data-size5-p3">Casual style (Orchard Garden, English Herbs, Harvest Dream, Totoro)</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-size5-p4" value="Cher Blanc style" name="size5-filter" data-size5="(product_type:product=Cher Blanc style)" />
                                  <label for="data-size5-p4">Cher Blanc style</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-size5-p5" value="Chopstick" name="size5-filter" data-size5="(product_type:product=Chopstick)" />
                                  <label for="data-size5-p5">Chopstick</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-size5-p6" value="Coco Fleur Style" name="size5-filter" data-size5="(product_type:product=Coco Fleur Style)" />
                                  <label for="data-size5-p6">Coco Fleur Style</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-size5-p7" value="Commander style" name="size5-filter" data-size5="(product_type:product=Commander style)" />
                                  <label for="data-size5-p7">Commander style</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-size5-p8" value="Fine Dining style" name="size5-filter" data-size5="(product_type:product=Fine Dining style)" />
                                  <label for="data-size5-p8">Fine Dining style</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-size5-p9" value="Futaba style" name="size5-filter" data-size5="(product_type:product=Futaba style)" />
                                  <label for="data-size5-p9">Futaba style</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-size5-p10" value="Hana Sarasa Style" name="size5-filter" data-size5="(product_type:product=Hana Sarasa Style)" />
                                  <label for="data-size5-p10">Hana Sarasa Style</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-size5-p11" value="Kyoka style" name="size5-filter" data-size5="(product_type:product=Kyoka style)" />
                                  <label for="data-size5-p11">Kyoka style</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-size5-p12" value="Masters style" name="size5-filter" data-size5="(product_type:product=Masters style)" />
                                  <label for="data-size5-p12">Masters style</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-size5-p13" value="Orchard Garden / English Herbs style" name="size5-filter" data-size5="(product_type:product=Orchard Garden / English Herbs style)" />
                                  <label for="data-size5-p13">Orchard Garden / English Herbs style</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-size5-p14" value="Paramount style" name="size5-filter" data-size5="(product_type:product=Paramount style)" />
                                  <label for="data-size5-p14">Paramount style</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-size5-p15" value="Renaissance style" name="size5-filter" data-size5="(product_type:product=Renaissance style)" />
                                  <label for="data-size5-p15">Renaissance style</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-size5-p16" value="Sheer White style" name="size5-filter" data-size5="(product_type:product=Sheer White style)" />
                                  <label for="data-size5-p16">Sheer White style</label>
                                </li>

                                <li>
                                  <input type="checkbox" id="data-size5-p17" value="Yamazaki Cutlery" name="size5-filter" data-size5="(product_type:product=Yamazaki Cutlery)" />
                                  <label for="data-size5-p17">Yamazaki Cutlery</label>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>

                        <!-- ./filter chất liệu -->

                        <div class="filter-group">
                          <div class="filter-group-block">
                            <div class="filter-group-subtitle tr04">
                              <span>Chất liệu</span>
                              <span class="icon-control">
                                <i id="icon-plus-4" class="fa fa-plus" aria-hidden="true"></i>
                                <i id="icon-minus-4" class="fa fa-minus" aria-hidden="true"></i>
                              </span>
                            </div>
                            <div id="filter-size1" class="filter-group-content filter-size1">
                              <ul class="checkbox-list">
                                <li>
                                  <input type="checkbox" id="data-size1-p1" value="Sứ xương" name="size1-filter" data-size1="(tag:product=Sứ xương)" />
                                  <label for="data-size1-p1">Sứ xương</label>
                                </li>
                                <li>
                                  <input type="checkbox" id="data-size1-p2" value=" Sứ trắng cao cấp" name="size1-filter" data-size1="(tag:product= Sứ trắng cao cấp)" />
                                  <label for="data-size1-p2"> Sứ trắng cao cấp</label>
                                </li>
                                <li>
                                  <input type="checkbox" id="data-size1-p3" value=" Sứ trắng" name="size1-filter" data-size1="(tag:product= Sứ trắng)" />
                                  <label for="data-size1-p3"> Sứ trắng</label>
                                </li>
                                <li>
                                  <input type="checkbox" id="data-size1-p4" value=" Kim loại" name="size1-filter" data-size1="(tag:product= Kim loại)" />
                                  <label for="data-size1-p4"> Kim loại</label>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>


                        <div class="filter-group">
                          <div class="filter-group-block">
                            <div class="filter-group-subtitle tr05">
                              <span>Loại sản phẩm</span>
                              <span class="icon-control">
                                <i id="icon-plus-5" class="fa fa-plus" aria-hidden="true"></i>
                                <i id="icon-minus-5" class="fa fa-minus" aria-hidden="true"></i>
                              </span>
                            </div>
                            <div id="filter-size2" class="filter-group-content filter-size2">
                              <ul class="checkbox-list">
                                <li>
                                  <input type="checkbox" id="data-size2-p1" value="Bình hoa" name="size2-filter" data-size2="(tag:product=Bình hoa)" />
                                  <label for="data-size2-p1">Bình hoa</label>
                                </li>
                                <li>
                                  <input type="checkbox" id="data-size2-p2" value=" Bình trà/coffee" name="size2-filter" data-size2="(tag:product= Bình trà/coffee)" />
                                  <label for="data-size2-p2"> Bình trà/coffee</label>
                                </li>
                                <li>
                                  <input type="checkbox" id="data-size2-p3" value=" Tách trà/coffee và đĩa lót" name="size2-filter" data-size2="(tag:product= Tách trà/coffee và đĩa lót)" />
                                  <label for="data-size2-p3"> Tách trà/coffee và đĩa lót</label>
                                </li>
                                <li>
                                  <input type="checkbox" id="data-size2-p4" value=" Hũ đường/Hũ sữa" name="size2-filter" data-size2="(tag:product= Hũ đường/Hũ sữa)" />
                                  <label for="data-size2-p4"> Hũ đường/Hũ sữa</label>
                                </li>
                                <li>
                                  <input type="checkbox" id="data-size2-p5" value=" Cốc uống nước/coffee" name="size2-filter" data-size2="(tag:product= Cốc uống nước/coffee)" />
                                  <label for="data-size2-p5"> Cốc uống nước/coffee</label>
                                </li>
                                <li>
                                  <input type="checkbox" id="data-size2-p6" value=" Chén/Bát/Tô" name="size2-filter" data-size2="(tag:product= Chén/Bát/Tô)" />
                                  <label for="data-size2-p6"> Chén/Bát/Tô</label>
                                </li>
                                <li>
                                  <input type="checkbox" id="data-size2-p7" value=" Đĩa các loại" name="size2-filter" data-size2="(tag:product= Đĩa các loại)" />
                                  <label for="data-size2-p7"> Đĩa các loại</label>
                                </li>
                                <li>
                                  <input type="checkbox" id="data-size2-p8" value=" Thố đựng cơm/ canh/ salad" name="size2-filter" data-size2="(tag:product= Thố đựng cơm/ canh/ salad)" />
                                  <label for="data-size2-p8"> Thố đựng cơm/ canh/ salad</label>
                                </li>
                                <li>
                                  <input type="checkbox" id="data-size2-p9" value=" Lọ đựng tiêu/muối" name="size2-filter" data-size2="(tag:product= Lọ đựng tiêu/muối)" />
                                  <label for="data-size2-p9"> Lọ đựng tiêu/muối</label>
                                </li>
                                <li>
                                  <input type="checkbox" id="data-size2-p10" value=" Hũ đựng nước xốt" name="size2-filter" data-size2="(tag:product= Hũ đựng nước xốt)" />
                                  <label for="data-size2-p10"> Hũ đựng nước xốt</label>
                                </li>
                                <li>
                                  <input type="checkbox" id="data-size2-p11" value=" Dao/Muỗng/Nĩa" name="size2-filter" data-size2="(tag:product= Dao/Muỗng/Nĩa)" />
                                  <label for="data-size2-p11"> Dao/Muỗng/Nĩa</label>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>

                        <div class="filter-group">
                          <div class="filter-group-block">
                            <div class="filter-group-subtitle tr06">
                              <span>Sản phẩm lẻ/bộ</span>
                              <span class="icon-control">
                                <i id="icon-plus-6" class="fa fa-plus" aria-hidden="true"></i>
                                <i id="icon-minus-6" class="fa fa-minus" aria-hidden="true"></i>
                              </span>
                            </div>
                            <div id="filter-size3" class="filter-group-content filter-size3">
                              <ul class="checkbox-list">
                                <li>
                                  <input type="checkbox" id="data-size3-p1" value="Sản phẩm lẻ" name="size3-filter" data-size3="(tag:product=Sản phẩm lẻ)" />
                                  <label for="data-size3-p1">Sản phẩm lẻ</label>
                                </li>
                                <li>
                                  <input type="checkbox" id="data-size3-p2" value=" Sản phẩm theo bộ" name="size3-filter" data-size3="(tag:product= Sản phẩm theo bộ)" />
                                  <label for="data-size3-p2"> Sản phẩm theo bộ</label>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>

                        <div class="filter-group">
                          <div class="filter-group-block">
                            <div class="filter-group-subtitle tr07">
                              <span>Mục đích sử dụng</span>
                              <span class="icon-control">
                                <i id="icon-plus-7" class="fa fa-plus" aria-hidden="true"></i>
                                <i id="icon-minus-7" class="fa fa-minus" aria-hidden="true"></i>
                              </span>
                            </div>
                            <div id="filter-size4" class="filter-group-content filter-size4">
                              <ul class="checkbox-list">
                                <li>
                                  <input type="checkbox" id="data-size4-p1" value="Dùng trong bữa ăn châu Á" name="size4-filter" data-size4="(tag:product=Dùng trong bữa ăn châu Á)" />
                                  <label for="data-size4-p1">Dùng trong bữa ăn châu Á</label>
                                </li>
                                <li>
                                  <input type="checkbox" id="data-size4-p2" value=" Dùng trong bữa ăn châu Âu" name="size4-filter" data-size4="(tag:product= Dùng trong bữa ăn châu Âu)" />
                                  <label for="data-size4-p2"> Dùng trong bữa ăn châu Âu</label>
                                </li>
                                <li>
                                  <input type="checkbox" id="data-size4-p3" value=" Dùng cho bàn trà/ coffee" name="size4-filter" data-size4="(tag:product= Dùng cho bàn trà/ coffee)" />
                                  <label for="data-size4-p3"> Dùng cho bàn trà/ coffee</label>
                                </li>
                                <li>
                                  <input type="checkbox" id="data-size4-p4" value=" Trang trí/Phòng khách" name="size4-filter" data-size4="(tag:product= Trang trí/Phòng khách)" />
                                  <label for="data-size4-p4"> Trang trí/Phòng khách</label>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>

                        <!-- ./filter giá -->
                        <div class="filter-group">
                          <div class="filter-group-block">
                            <div class="filter-group-subtitle tr03">
                              <span>Khoảng giá</span>
                              <span class="icon-control">
                                <i id="icon-plus-3" class="fa fa-plus" aria-hidden="true"></i>
                                <i id="icon-minus-3" class="fa fa-minus" aria-hidden="true"></i>
                              </span>
                            </div>
                            <div id="filter-price" class="filter-group-content filter-price">
                              <ul class="checkbox-list">
                                <li>
                                  <input type="checkbox" id="p1" name="cc" data-price="(price:product<=1000000)" />
                                  <label for="p1">
                                    <span>Dưới</span> 1.000.000₫
                                  </label>
                                </li>
                                <li>
                                  <input type="checkbox" id="p2" name="cc" data-price="((price:product>1000000)&amp;&amp;(price:product<=2000000))" />
                                  <label for="p2">
                                    1.000.000₫ - 2.000.000₫
                                  </label>
                                </li>
                                <li>
                                  <input type="checkbox" id="p3" name="cc" data-price="((price:product>2000000)&amp;&amp;(price:product<=3000000))" />
                                  <label for="p3">
                                    2.000.000₫ - 3.000.000₫
                                  </label>
                                </li>
                                <li>
                                  <input type="checkbox" id="p4" name="cc" data-price="((price:product>3000000)&amp;&amp;(price:product<=4000000))" />
                                  <label for="p4">
                                    3.000.000₫ - 4.000.000₫
                                  </label>
                                </li>
                                <li>
                                  <input type="checkbox" id="p5" name="cc" data-price="(price:product>=5000000)" />
                                  <label for="p5">
                                    <span>Trên</span> 5.000.000₫
                                  </label>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="collection-options-sortby sort-trai collection-sortby collection-sortby-option">
                <div class="collection-sortby-title js-sortby-title01 sort-trai d-flex align-items-center">
                  <span class="title-sortx">Sắp xếp: </span>
                  <div class="border-sort-trai">
                    <span class="title-sort"></span>
                    <span class="sort-by-icon">
                      <svg class="icon-sort-by" aria-labelledby="sort-by-dropdown">
                        <path d="M22.4960571,11.5078274 C22.7675921,11.7793624 22.7675921,12.2196077 22.4960571,12.4911427 L15.4914,19.4961248 C15.219865,19.7676598 14.7796197,19.7676598 14.5080847,19.4961248 L7.50335959,12.4913996 C7.23182458,12.2198646 7.23182458,11.7796194 7.50335959,11.5080844 C7.77489459,11.2365494 8.21513981,11.2365494 8.48667481,11.5080844 L14.9995799,18.0209894 L21.5127419,11.5078274 C21.7842769,11.2362924 22.2245221,11.2362924 22.4960571,11.5078274 Z"></path>
                      </svg>
                    </span>
                  </div>
                </div>
                <div class="collection-sortby-custom collection-sortby-custom_option">
                  <ul class="custom-select-menu sort-by">

                    <li><span data-value="manual">Sản phẩm nổi bật</span></li>
                    <li><span data-value="price-ascending" data-filter="&amp;sortby=(price:product=asc)">Giá: Tăng dần</span></li>
                    <li><span data-value="price-descending" data-filter="&amp;sortby=(price:product=desc)">Giá: Giảm dần</span></li>
                    <li><span data-value="title-ascending" data-filter="&amp;sortby=(title:product=asc)">Tên: A-Z</span></li>
                    <li><span data-value="title-descending" data-filter="&amp;sortby=(price:product=desc)">Tên: Z-A</span></li>
                    <li><span data-value="created-ascending" data-filter="&amp;sortby=(updated_at:product=desc)">Cũ nhất</span></li>
                    <li><span data-value="created-descending" data-filter="&amp;sortby=(updated_at:product=asc)">Mới nhất</span></li>
                    <li><span data-value="best-selling" data-filter="&amp;sortby=(sold_quantity:product=desc)">Bán chạy nhất</span></li>
                    <li><span data-value="quantity-descending">Tồn kho: Giảm dần</span></li>
                  </ul>
                </div>
              </div>



            </div>
          </div>