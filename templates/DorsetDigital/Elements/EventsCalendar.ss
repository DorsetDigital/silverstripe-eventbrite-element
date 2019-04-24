<div class="container my-4">
    <% if $ShowTitle %>
        <div class="row">
            <div class="col-12">
                <h2 class="content-element__title">$Title</h2>
            </div>
        </div>
    <% end_if %>
    <div class="row">
        <% loop $Events %>
            <div class="col-6 col-md-4 col-lg-3 mb-4">
                <div class="eventselement__eventcard">
                    <div class="eventselement__eventimage"
                        <% if $Image %> style="background-image: url('$Image')"
                        <% end_if %>
                    >
                    </div>
                    <div class="eventselement__eventmeta">
                        <div class="row no-gutters">
                            <div class="col-7 col-sm-3 eventlist__dateholder text-center bghighlight text-white p-2">
                                <span class="eventlist__date--day">$Start.DayOfMonth</span>
                                <span class="eventlist__date--month">$Start.ShortMonth</span>
                                <span class="eventlist__date--day d-flex d-sm-none">
                                    $Start.Format('H:mm')<span class="text-lowercase">$Start.Format('a')</span>
                                </span>
                            </div>
                            <div class="col-4 p-2 d-none d-sm-flex align-items-center justify-content-center">
                                <span class="eventlist__date--day">
                                    $Start.Format('H:mm')<span class="text-lowercase">$Start.Format('a')</span>
                                </span>
                            </div>
                            <div class="col-5 text-white bghighlight d-flex align-items-center justify-content-center">
                                <a href="$Link" class="eventlist__bookbutton text-white px-2">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="eventselement__titleholder px-3 pt-3 text-center texthighlight text-uppercase">
                        <p>$Title</p>
                    </div>
                </div>
            </div>
        <% end_loop %>
    </div>
</div>

<% require themedCSS('client/dist/css/events') %>