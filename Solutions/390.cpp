#include <bits/stdc++.h>
using namespace std;

int main() {
	int t,n,blah,dummy,x,y,z;
	cin>>t;
	while(t--)
	{
	    long long int ans=1;
	    cin>>n;
	    dummy=n;
	    while(dummy>0)
	    {
	        x=dummy%10;
	        ans=ans*x;
	        dummy/=10;
	    }
	    cout<<ans<<"\n";
	}
	return 0;
}