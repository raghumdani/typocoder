#include <iostream>
#include <conio.h>
using namespace std;


#include <bits/stdc++.h>

long long int n=100001;
   long long int a[100001],l;

int binarysearch(long long int a[],long long int n,long long int low,long long int high)
	{ int mid;
	  if (low > high)
	   return -1;
	  mid = (low + high)/2;
	  if(n == a[mid])
	    {
	      return 0;
	    }
	  else if(n < a[mid])
	    { high = mid - 1;
	      binarysearch(a,n,low,high);
	    }
	  else if(n > a[mid])
	    { low = mid + 1;
	      binarysearch(a,n,low,high);
	    }
	 }



void SieveOfEratosthenes(long long 
                         int n)
{

    bool prime[n+1];
    memset(prime, true, sizeof(prime));

    for (int p=2; p*p<=n; p++)
    {

        if (prime[p] == true)
        {
            // Update all multiples of p
            for (int i=p*2; i<=n; i += p)
                prime[i] = false;
        }
    }


    for (int p=2,l=0; p<=n; p++,l++)
       if (prime[p])
          a[l]=p;
}


int main()
{

long long int t,h,y;
int x;
cin>>t;
 SieveOfEratosthenes(n);
for(h=0;h<t;h++)
{
    cin>>y;

    x=binarysearch(a,y,0,l-1);
    if(x==0)
        cout<<"YES"<<endl;
        else
            cout<<"NO"<<endl;
}
    getch();
    return 0;
}
