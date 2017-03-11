#include <iostream.h> 

main() 
{ 
	int t;
	cin>>t;
	for(int i=0;i<t;i++)
	{
	    long long int temp,n,now=1;
	    int k,no=0;
	    cin>>n>>k;
	    temp=n;
	    while(k!=0)
	    {
	        no++;
	        k/=2;
	    }
	    for(i=no-k+1;i<=no;i++)
	        now*=i;
	    if(no<k)
	        now=0;
	    cout<<now;
	}
}