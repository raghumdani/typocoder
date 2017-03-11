#include<bits/stdc++.h>
using namespace std ;

int n  , a[2009] , mem[2009] , mem1[2009] , ans1[2009] ,  ans[2009]; 
vector < int > v; 

void solve1(int i)
{
	 
	 v.push_back(a[i]) ;
	 //cout<<" "<<i<<endl;
	 if(ans[i] != i)
	 solve1(ans[i]) ;
}
void solve2(int i)
{
	v.push_back(a[i]) ;
//	cout<<i<<" "<<endl;
	 if(ans1[i] != i)
	 solve2(ans1[i]) ;
}
int main()
{
	int t ;
	cin>>t;
	
	while(t--)
	{
		v.clear() ;
       cin>>n;
	   
	   memset(mem , 0 , sizeof(mem)) ;
	   memset(mem1 , 0 , sizeof(mem1)) ;
	   
	   for(int i =0; i<n;i++)
	   cin>>a[i] ;
	   
	   for(int i=0;i<n;i++)
	   {
	   	  mem[i] = 1 ;
	   	  ans[i] = i ;
         for(int j=0;j<i;j++)
		 {
		    	if(mem[j]%2==0 && a[i]<a[j])
		    	{
		    		if(mem[j] +1 > mem[i])
		    		{
		    			mem[i] = mem[j] + 1 ;
		    			ans[i] = j  ;
					}
				}
				else if(mem[j]%2 && a[i]>a[j])
				{
					if(mem[j] +1 > mem[i])
		    		{
		    			mem[i] = mem[j] +1  ;
		    			ans[i] = j  ;
					} 
				}
     	 }	   	
	   }
	   
	   for(int i=0;i<n;i++)
	   {
	   	mem1[i] =1 ;
	   	ans1[i] = i ;
         for(int j=0;j<i;j++)
		 {
		    	if(mem1[j]%2==0 && a[i]>a[j])
		    	{
		    		if(mem1[j] +1 > mem1[i])
		    		{
		    			mem1[i] = mem1[j]  + 1;
		    			ans1[i] = j  ;
					}
				}
				else if(mem1[j]%2 && a[i]<a[j])
				{
					if(mem1[j] +1 > mem1[i])
		    		{
		    			mem1[i] = mem1[j] + 1 ;
		    			ans1[i] = j  ;
					} 
				}
     	 }
		 // cout<<mem1[i]<<" "<<i<<" "<<ans1[i]<<endl;	   	
	   }
	   
	   int ind1 , ind2 , a1= 0 ,a2 = 0;
	   
	   for(int i=0;i<n;i++)
	   {
	   	 if(mem[i]>=a1)
	   	 {
	   	    ind1 = i ;
			a1 = mem[i] ; 	
		 }
		 
	   }
	   
	   for(int i=0;i<n;i++)
	   {
	   	 if(mem1[i]>=a2)
	   	 {
	   	    ind2 = i ;
			a2 = mem1[i] ; 	
		 }
		 
	   }
	   //cout<<a1<<" "<<a2<<endl;
	   if(a2 >= a1)
	   {
	   	 solve2(ind2) ;
	   	// cout<<"Y\n" ;
	   }
	   else
	   {
          solve1(ind1) ;	   	
	   }		
	 // cout<<mem[ind1]<<" "<<mem1[ind2]<<"\n";
	   cout<<v.size()<<"\n";
	   for(int i=0;i<v.size();i++)
	   cout<<v[i]<<" ";
	   cout<<"\n" ;
 	}
	return 0 ;
}